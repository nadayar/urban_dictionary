<?php

namespace Nadayar\Tests;

use Nadayar\WordRankings;
use PHPUnit_Framework_TestCase;

class WordRankingsTest extends PHPUnit_Framework_TestCase 
{
    public function setUp() 
    {
        $this->rankingUtils = new WordRankings();
    }

    public function tearDown(){ }

    public function testSentenceRanking()
    {
        $input = "This example is the dumbest example we could create for the dumbest people. Smh example";

        $expected_output = ["example" => 3, "dumbest" => 2, "the" => 2, "for" => 1, "people." => 1, "Smh" => 1, "create" => 1,
                            "we" => 1, "is" => 1, "This" => 1, "could" => 1];

        $computed_output = $this->rankingUtils->getRankings($input);
        $this->assertEquals($computed_output, $expected_output);
    }
}
