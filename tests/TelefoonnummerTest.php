<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Telefoonnummer;

class TelefoonnummerTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('telefoonnummerProvider')]
    public function testValidateTelefoonnummer($telefoonnummer, $expected)
    {
        $telefoonnummerVal = new Telefoonnummer();

        $this->assertEquals(
            $expected,
            $telefoonnummerVal->validateTelefoonnummer($telefoonnummer)
        );
    }

    public static function telefoonnummerProvider(): array
    {
        return [
            // Geldige Nederlandse mobiele nummers
            ['0612345678', true],
            ['0698765432', true],
            ['0611111111', true],
            ['0622222222', true],
            ['0633333333', true],
            ['0644444444', true],
            ['0655555555', true],
            ['0666666666', true],
            ['0677777777', true],
            ['0688888888', true],
            ['0699999999', true],

            // Met spaties
            ['06 12345678', true],
            ['06 98765432', true],
            ['0 6 12345678', true],
            ['06 12 34 56 78', true],

            // Met streepjes
            ['06-12345678', true],
            ['06-12-34-56-78', true],
            ['06-98765432', true],

            // Internationale notatie
            ['+31612345678', true],
            ['+31698765432', true],
            ['+31 6 12345678', true],
            ['+31-6-12345678', true],
            ['+31 6 98765432', true],
            ['+31-6-98765432', true],

            // Te kort
            ['061234567', false],
            ['06123456', false],
            ['+3161234567', false],

            // Te lang
            ['06123456789', false],
            ['061234567890', false],
            ['+316123456789', false],

            // Geen mobiel nummer
            ['0111234567', false],
            ['0123456789', false],
            ['0131234567', false],
            ['0201234567', false],
            ['0301234567', false],
            ['0401234567', false],

            // Letters / verkeerde tekens
            ['061234567A', false],
            ['06ABCDEF12', false],
            ['abcdefghij', false],
            ['06@1234567', false],
            ['06/12345678', false],

            // Verkeerde internationale notatie
            ['31612345678', false],
            ['0031612345678', false],
            ['+310612345678', false],

            // Lege / ongeldige input
            ['', false],
            [' ', false],
            ['06', false],
            ['Nederland', false],
        ];
    }
}