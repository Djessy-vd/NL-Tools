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

    public static function kentekenProvider(): array{
        return [
            // Geldige kentekens - alle formaten
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

            // Geldige kentekens met streepjes
            ['AB-12-34', true],
            ['12-34-AB', true],
            ['12-AB-34', true],
            ['AB-12-CD', true],
            ['AB-CD-12', true],
            ['12-AB-CD', true],
            ['12-ABC-3', true],
            ['1-ABC-23', true],
            ['AB-123-C', true],
            ['A-123-BC', true],
            ['ABC-12-D', true],

            // Geldige kentekens met spaties
            ['AB 1234', true],
            ['12 34 AB', true],
            ['12 AB 34', true],
            ['AB 12 CD', true],
            ['AB CD 12', true],
            ['12 AB CD', true],
            ['12 ABC 3', true],
            ['1 ABC 23', true],

            // Geldige kentekens met spaties + streepjes
            ['AB - 12 - 34', true],
            ['12 - AB - 34', true],
            ['A - 123 - BC', true],

            // Ongeldige kleine letters
            ['ab1234', false],
            ['1234ab', false],
            ['12ab34', false],
            ['ab12cd', false],
            ['abcd12', false],
            ['abc12d', false],

            // Ongeldige lengte
            ['AB123', false],
            ['123AB', false],
            ['AB12', false],
            ['A123', false],
            ['ABC12', false],
            ['AB12345', false],
            ['12345AB', false],
            ['ABC12345', false],

            // Ongeldige tekens
            ['AB@1234', false],
            ['AB#1234', false],
            ['AB_1234', false],
            ['AB.1234', false],
            ['AB/1234', false],

            // Verkeerde combinaties
            ['A1B234', false],
            ['123ABC4', false],
            ['ABC123', false],
            ['123456', false],
            ['AAAAAA', false],
            ['111111', false],
            ['12345678', false],

            // Lege / ongeldige input
            ['', false],
            [' ', false],
            ['-', false],
            ['---', false],
            ['Nederland', false],
            ['kenteken', false],
        ];
    }
}