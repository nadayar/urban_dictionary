<?php

namespace Nadayar\Tests;

use Nadayar\DictionaryDataProvider;
use Nadayar\UrbanDictionary;
use Nadayar\WordRankings;
use PHPUnit_Framework_TestCase;

class UrbanDictionaryTest extends PHPUnit_Framework_TestCase 
{
    private $urbanDict;

    public function setUp()
    {
        $DataProvider = new DictionaryDataProvider(); 
        $rankingUtils = new WordRankings();
        $this->urbanDict = new UrbanDictionary($DataProvider, $rankingUtils);
    }

    public function tearDown(){ }

    public function testSlangRanking()
    {
        $expected_rankings = ["Tight" => 2, "Tight!!!" => 1];

        $computed_rankings = $this->urbanDict->getRankings("Tight");
        $this->assertEquals($expected_rankings, $computed_rankings);
    }
}
