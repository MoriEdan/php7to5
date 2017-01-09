<?php

//include('vendor/autoload.php');
include('src/iphp7to5.php');
include('src/php7to5.php');


class PHP7To5Test extends PHPUnit_Framework_TestCase
{

    public function testParseContent()
    {

        $content = 'function abc($c, string $s, bool $b, float $f, double $ddd, int $p);';
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        var_dump($content);
        $this->assertTrue($content=='function abc($c, $s, $b, $f, $ddd, $p);', "true didn't end up being false!");

        $content = "\nfunction abc():\ZipArchive;";
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        $this->assertTrue($content=="\nfunction abc();", "true didn't end up being false!");

        $content = "\nfunction abc():\ZipArchive{";
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        $this->assertTrue($content=="\nfunction abc(){", "true didn't end up being false!");

        $content = "\nfunction abc():\ZipArchive";
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        $this->assertTrue($content=="\nfunction abc()", "true didn't end up being false!");

    }

    public function testToZip()
    {
        $zip = \premiumwebtechnologies\php7to5\PHP7To5::toZip('sample');
    }

}
