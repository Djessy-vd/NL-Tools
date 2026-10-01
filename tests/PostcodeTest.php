<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Postcode;

class PostcodeTest extends TestCase{
    #[\PHPUnit\Framework\Attributes\DataProvider('postcodeProvider')]
    public function testValidatePostalCode($postal, $expected){
        $postcode = new Postcode();
        
        $this->assertEquals($postcode->validatePostalCode($postal), $expected);
    }

    public static function postcodeProvider(): array
    {
    return [
        ['1122AB', true],
        ['1122 AB', true],
        ['12a', false],
        ['139SN', false],
        ['0123AB', false],
    ];
    }

    public function testFormatPostalCode(){
        $postcode = new Postcode();
        
        $this->assertEquals("1122 AB", $postcode->formatPostalCode("1122AB"));
        $this->assertEquals("1122 AB", $postcode->formatPostalCode("1122 ab"));
        $this->assertFalse($postcode->formatPostalCode("12a"));
        $this->assertFalse($postcode->formatPostalCode("139SN"));
    }
}