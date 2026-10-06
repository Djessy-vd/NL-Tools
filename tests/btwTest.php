<?php
//----------------------------------------
//this tests alle the posible dutch btw numbers and formats, and checks if the output is correct
//----------------------------------------
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Btw;

class BtwTest extends TestCase{
    //validate
    #[\PHPUnit\Framework\Attributes\DataProvider('btwProvider')]
    public function testValidatebtw($btw, $expected){
        $btwval = new Btw();
        
        $this->assertEquals($expected, $btwval->validatebtw($btw));
    }

    public static function btwProvider(): array{
        return [
            // Geldige formaten
            ['NL123456789B01', true],
            ['NL987654321B99', true],
            ['NL000000000B00', true],
            ['NL111111111B11', true],
            ['NL999999999B99', true],

            // Met spaties
            ['NL 123456789B01', true],
            ['NL123456789 B01', true],
            ['NL123456789B 01', true],
            ['NL 123456789 B 01', true],
            [' NL123456789B01 ', true],

            // Kleine letters
            ['nl123456789b01', false],
            ['Nl123456789B01', false],
            ['NL123456789b01', false],

            // Verkeerde landcode
            ['BE123456789B01', false],
            ['DE123456789B01', false],
            ['XX123456789B01', false],
            ['123456789B01', false],

            // Te weinig cijfers voor het nummer
            ['NL12345678B01', false],
            ['NL1234567B01', false],
            ['NL123456B01', false],

            // Te veel cijfers voor het nummer
            ['NL1234567890B01', false],
            ['NL12345678901B01', false],

            // B ontbreekt
            ['NL12345678901', false],
            ['NL123456789A01', false],
            ['NL123456789C01', false],

            // Verkeerd aantal cijfers na B
            ['NL123456789B0', false],
            ['NL123456789B', false],
            ['NL123456789B001', false],

            // Letters op verkeerde plekken
            ['NLABCDEFGHI B01', false],
            ['NL12345678AB01', false],
            ['NL123456789AB1', false],

            // Onzin / leeg
            ['', false],
            ['NL', false],
            ['hello', false],
            ['123456789', false],
            ['NL123', false],
        ];
    }
}