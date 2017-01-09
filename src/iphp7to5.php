<?php

declare( strict_types = 1 );

namespace premiumwebtechnologies\php7to5;

interface IPHP7To5
{
    public static function parse_directory(string $directory, array $parsedFiles):array;
    public static function parse_content(string $content):string;
}