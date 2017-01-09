<?php
declare(strict_types = 1);


namespace premiumwebtechnologies\php7to5;


class PHP7To5 implements IPHP7To5
{

    public static function parse_directory(string $directory, array $parsedFiles):array
    {
        // Check directory exists and
        if (is_dir($directory)) {
            // If it does, parse it.
            if (!isset($parsedFiles[$directory])) {
                $parsedFiles[$directory] = array();
            }
            foreach (new \DirectoryIterator($directory) as $fileInfo) {
                if (!$fileInfo->isDot()) {
                    if ($fileInfo->isDir()) {
                        $parsedFiles[$fileInfo->getPathname()] = self::parse_directory($fileInfo->getPathname(), $parsedFiles);
                    } else{
                        $parsedFiles[$fileInfo->getPathname()] = self::parse_content(file_get_contents($fileInfo->getPathname()));
                    }
                }
            }
        }
        return $parsedFiles;
    }

    public static function parse_content(string $content):string
    {
        // Remove ):[type]; from end of lines.
        $content = preg_replace("/\)\s*\:[a-zA-Z]*\s*\;/", ");", $content);

        // Remove ):[type]{ from end of lines.
        $content = preg_replace("/\)\s*\:[a-zA-Z]*\s*\{/", "){", $content);

        // Remove ):[type] from end of lines.
        $content = preg_replace("/\)\s*\:[a-zA-Z]*\s*$/", ")", $content);

        return $content;
    }

}