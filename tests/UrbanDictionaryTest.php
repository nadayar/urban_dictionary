<?php

namespace Nadayar\Tests;

use Nadayar\DictionaryDataManager;
use Nadayar\UrbanDictionary;
use Nadayar\WordRankings;
use PHPUnit_Framework_TestCase;

class UrbanDictionaryTest extends PHPUnit_Framework_TestCase 
{
    private $urbanDict;

    public function setUp()
    {
        $DataProvider = new DictionaryDataManager(); 
        $rankingUtils = new WordRankings();
        $this->urbanDict = new UrbanDictionary($DataProvider, $rankingUtils);
    }

    public function tearDown(){ }

    public function testSlangRanking()
    {
        $expectedRankings = ["Tight" => 2, "Tight!!!" => 1];

        $computedRankings = $this->urbanDict->getRankings("Tight");
        $this->assertEquals($expectedRankings, $computedRankings);
    }
}
