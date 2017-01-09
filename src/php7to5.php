<?php
declare(strict_types = 1);


namespace premiumwebtechnologies\php7to5;


class PHP7To5 implements IPHP7To5
{

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