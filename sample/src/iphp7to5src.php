<?php

declare( strict_types = 1 );

namespace premiumwebtechnologies\php7to5;

interface IPHP7To5
{
    public static function toZip(string $directory):\ZipArchive;
    public static function parse_directory(\ZipArchive $zip, string $directory):\ZipArchive;
    public static function parse_content(string $content):string;
}