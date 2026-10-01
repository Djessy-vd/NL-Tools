<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Postcode;

class PostcodeTest extends TestCase{
    public function testValidatePostalCode(){
        $postcode = new Postcode();
        
        $this->assertTrue($postcode->validatePostalCode("1122AB"));
        $this->assertTrue($postcode->validatePostalCode("1122 AB"));
        $this->assertFalse($postcode->validatePostalCode("12a"));
        $this->assertFalse($postcode->validatePostalCode("139SN"));
    }

    public function testFormatPostalCode(){
        $postcode = new Postcode();
        
        $this->assertEquals("1122 AB", $postcode->formatPostalCode("1122AB"));
        $this->assertEquals("1122 AB", $postcode->formatPostalCode("1122 ab"));
        $this->assertFalse($postcode->formatPostalCode("12a"));
        $this->assertFalse($postcode->formatPostalCode("139SN"));
    }
}