<?php
//----------------------------------------
//this tests alle the posible dutch holydays and formats, and checks if the output is correct
//----------------------------------------
require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Djessy\NlTools\Feestdagen;

class FeestdagenTest extends TestCase
{
    public function testFeestdagen2026()
    {
        $feestdagen = new Feestdagen();

        $result = $feestdagen->getFeestdagen(2026);

        $this->assertEquals('2026-01-01', $result['Nieuwjaarsdag']);
        $this->assertEquals('2026-04-03', $result['Goede Vrijdag']);
        $this->assertEquals('2026-04-05', $result['Eerste Paasdag']);
        $this->assertEquals('2026-04-06', $result['Tweede Paasdag']);
        $this->assertEquals('2026-04-27', $result['Koningsdag']);
        $this->assertEquals('2026-05-05', $result['Bevrijdingsdag']);
        $this->assertEquals('2026-05-14', $result['Hemelvaartsdag']);
        $this->assertEquals('2026-05-24', $result['Eerste Pinksterdag']);
        $this->assertEquals('2026-05-25', $result['Tweede Pinksterdag']);
        $this->assertEquals('2026-12-25', $result['Eerste Kerstdag']);
        $this->assertEquals('2026-12-26', $result['Tweede Kerstdag']);

        $this->assertEquals('2026-02-14', $result['Valentijnsdag']);
        $this->assertEquals('2026-03-08', $result['Internationale Vrouwendag']);
        $this->assertEquals('2026-04-26', $result['Koningsnacht']);
        $this->assertEquals('2026-10-04', $result['Dierendag']);
        $this->assertEquals('2026-10-31', $result['Halloween']);
        $this->assertEquals('2026-12-05', $result['Sinterklaasavond']);
        $this->assertEquals('2026-12-31', $result['Oudejaarsavond']);
    }
}