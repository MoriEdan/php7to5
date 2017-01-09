<?php

include('src/iphp7to5.php');
include('src/php7to5.php');


class PHP7To5Test extends PHPUnit_Framework_TestCase
{

    public function testParseContent()
    {

        $content = "\nfunction abc():string;\nfunction abc():int;\nfunction abc():float;\nfunction abc():bool;";
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        $this->assertTrue($content=="\nfunction abc();\nfunction abc();\nfunction abc();\nfunction abc();", "true didn't end up being false!");

        $content = "\nfunction abc():string{";
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        $this->assertTrue($content=="\nfunction abc(){", "true didn't end up being false!");

        $content = "\nfunction abc():string";
        $content = \premiumwebtechnologies\php7to5\PHP7To5::parse_content($content);
        $this->assertTrue($content=="\nfunction abc()", "true didn't end up being false!");

    }

    public function testParseDirectory()
    {
        $parsedFiles = array();
        $parsedFiles = \premiumwebtechnologies\php7to5\PHP7To5::parse_directory('src',$parsedFiles);
        var_dump($parsedFiles);
    }

}
