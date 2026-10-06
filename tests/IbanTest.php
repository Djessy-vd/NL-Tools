<?php
//----------------------------------------
//this tests alle the posible dutch bank numbers and formats, and checks if the output is correct
//----------------------------------------
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Iban;

class IbanTest extends TestCase{
    //validate
    #[\PHPUnit\Framework\Attributes\DataProvider('ibanProvider')]
    public function testValidateIban($iban, $expected){
        $ibanval = new Iban();
        
        $this->assertEquals($expected, $ibanval->validateIban($iban));
    }

    public static function ibanProvider(): array{
        return [
            // Geldig formaat
            ['NL43ABNA0417164322', true],
            ['NL43 ABNA 0417 1643 22', true],
            ['NL89INGB0123456789', true],
            ['NL89 INGB 0123 4567 89', true],
            ['NL00RABO1234567890', true],
            ['NL12BUNQ1234567890', true],
            ['NL99ASNB0123456789', true],

            // Verschillende hoofdletters / cijfers
            ['NL00ABCD0000000000', true],
            ['NL11ABCD1234567890', true],
            ['NL22BANK9999999999', true],
            ['NL33TEST0000000001', true],

            // Verkeerde landcode
            ['DE43ABNA0417164322', false],
            ['BE43ABNA0417164322', false],
            ['XX43ABNA0417164322', false],
            ['43ABNA0417164322', false],

            // Te weinig cijfers achteraan
            ['NL43ABNA041716432', false],
            ['NL43ABNA04171643', false],
            ['NL43ABNA0417164', false],

            // Te veel cijfers achteraan
            ['NL43ABNA04171643221', false],
            ['NL43ABNA041716432211', false],

            // Te weinig letters in bankcode
            ['NL43ABN0417164322', false],
            ['NL43AB0417164322', false],
            ['NL43A0417164322', false],

            // Te veel letters in bankcode
            ['NL43ABNAA0417164322', false],
            ['NL43ABCDE0417164322', false],

            // Verkeerde volgorde
            ['NLABABNA0417164322', false],
            ['NL4AABNA0417164322', false],
            ['NLAA12340417164322', false],

            // Kleine letters
            ['nl43abna0417164322', false],
            ['Nl43ABNA0417164322', false],
            ['NL43abna0417164322', false],

            // Spaties
            ['NL43 ABNA 0417 1643 22', true],
            ['NL89 INGB 0123 4567 89', true],
            ['NL43  ABNA 0417 1643 22', true],
            [' NL43ABNA0417164322', true],
            ['NL43ABNA0417164322 ', true],

            // Leeg / onzin
            ['', false],
            ['NL', false],
            ['123456789', false],
            ['hello', false],
            ['NLABCD', false],
        ];
    }
}