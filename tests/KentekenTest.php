<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Kenteken;

class KentekenTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('kentekenProvider')]
    public function testValidateKenteken($kenteken, $expected)
    {
        $kentekenval = new Kenteken();

        $this->assertEquals($expected, $kentekenval->validateKenteken($kenteken));
    }

    public static function kentekenProvider(): array
    {
        return [
            // Geldige kentekens
            ['AB1234', true],
            ['1234AB', true],
            ['12AB34', true],
            ['AB12CD', true],
            ['ABCD12', true],
            ['12ABCD', true],
            ['12ABC3', true],
            ['1ABC23', true],
            ['AB123C', true],
            ['A123BC', true],
            ['ABC12D', true],

            // Met spaties
            ['AB 1234', true],
            ['12 AB 34', true],
            ['AB 12 CD', true],
            ['1 ABC 23', true],

            // Kleine letters
            ['ab1234', false],
            ['12ab34', false],
            ['abc12d', false],

            // Te kort
            ['AB123', false],
            ['123AB', false],
            ['AB12', false],

            // Te lang
            ['AB12345', false],
            ['12345AB', false],
            ['ABC12345', false],

            // Verkeerde tekens
            ['AB-1234', false],
            ['AB@1234', false],
            ['AB#1234', false],
            ['AB_1234', false],

            // Verkeerde combinaties
            ['A1B234', false],
            ['123ABC4', false],
            ['ABC123', false],
            ['123456', false],
            ['AAAAAA', false],

            // Lege / ongeldige input
            ['', false],
            [' ', false],
            ['Nederland', false],
        ];
    }
}