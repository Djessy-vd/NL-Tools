<?php

namespace Djessy\NlTools;

class Feestdagen
{
    public function getFeestdagen($jaar)
    {
        $pasen = new \DateTime($jaar . '-03-21');
        $pasen->modify('+' . easter_days($jaar) . ' days');

        $feestdagen = [
            // Officiële / nationale feestdagen
            'Nieuwjaarsdag' => $jaar . '-01-01',
            'Goede Vrijdag' => (clone $pasen)->modify('-2 days')->format('Y-m-d'),
            'Eerste Paasdag' => $pasen->format('Y-m-d'),
            'Tweede Paasdag' => (clone $pasen)->modify('+1 day')->format('Y-m-d'),
            'Koningsdag' => $jaar . '-04-27',
            'Bevrijdingsdag' => $jaar . '-05-05',
            'Hemelvaartsdag' => (clone $pasen)->modify('+39 days')->format('Y-m-d'),
            'Eerste Pinksterdag' => (clone $pasen)->modify('+49 days')->format('Y-m-d'),
            'Tweede Pinksterdag' => (clone $pasen)->modify('+50 days')->format('Y-m-d'),
            'Eerste Kerstdag' => $jaar . '-12-25',
            'Tweede Kerstdag' => $jaar . '-12-26',

            // Bijzondere dagen
            'Valentijnsdag' => $jaar . '-02-14',
            'Internationale Vrouwendag' => $jaar . '-03-08',
            'Koningsnacht' => $jaar . '-04-26',
            'Dierendag' => $jaar . '-10-04',
            'Halloween' => $jaar . '-10-31',
            'Sinterklaasavond' => $jaar . '-12-05',
            'Oudejaarsavond' => $jaar . '-12-31',
        ];

        return $feestdagen;
    }
}