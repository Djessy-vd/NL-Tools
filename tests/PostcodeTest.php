<?php
//----------------------------------------
//this tests alle the posible dutch zipcodes and formats, and checks if the output is correct
//----------------------------------------
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Postcode;

class PostcodeTest extends TestCase{
    //validate
    #[\PHPUnit\Framework\Attributes\DataProvider('postcodeProvider')]
    public function testValidatePostalCode($postal, $expected){
        $postcode = new Postcode();
        
        $this->assertEquals($expected, $postcode->validatePostalCode($postal));
    }

    public static function postcodeProvider(): array
    {
    return [
        ['1122AB', true],
        ['1122 AB', true],
        ['1234AB', true],
        ['9999ZZ', true],
        ['1000AA', true],

        ['1122ab', true],
        ['1122 ab', true],

        ['0123AB', false],
        ['123AB', false],
        ['12345AB', false],
        ['1234A', false],
        ['1234ABC', false],
        ['12AB34', false],
        ['ABCD12', false],
        ['12a', false],
        ['139SN', false],
        ['0000AA', false],
        [' 1122AB', false],
        ['1122AB ', false],
        ['1122  AB', false],
        ['', false],
    ];
    }

    // format
    #[\PHPUnit\Framework\Attributes\DataProvider('formatPostcodeProvider')]
    public function testFormatPostalCode($postal, $expected){
        $postcode = new Postcode();

        $this->assertEquals($expected, $postcode->formatPostalCode($postal));
    }

    public static function formatPostcodeProvider(): array
    {
    return [
        ['1122AB', '1122 AB'],
        ['1122 AB', '1122 AB'],
        ['1122ab', '1122 AB'],
        ['1122 ab', '1122 AB'],
        ['1234CD', '1234 CD'],
        ['9999ZZ', '9999 ZZ'],
        ['1000aa', '1000 AA'],

        ['12a', false],
        ['0123AB', false],
        ['', false],
    ];
    }
}