<?php
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Postcode;

class PostcodeTest extends TestCase{
    //validate
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

    // format
    #[\PHPUnit\Framework\Attributes\DataProvider('formatPostcodeProvider')]
    public function testFormatPostalCode($postal, $expected){
        $postcode = new Postcode();

        $this->assertEquals($postcode->formatPostalCode($postal), $expected);
    }

    public static function formatPostcodeProvider(): array
    {
    return [
        ['1122AB', '1122 AB'],
        ['1122 ab', '1122 AB'],
        ['12a', false],
    ];
    }
}