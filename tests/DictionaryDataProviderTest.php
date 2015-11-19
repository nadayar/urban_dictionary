<?php

namespace Nadayar\Tests;

use Nadayar\DictionaryDataProvider;
use Nadayar\SlangDoesNotExist;
use PHPUnit_Framework_TestCase;

class DictionaryDataProviderTest extends PHPUnit_Framework_TestCase 
{
    public function setUp()
    {
        $this->slangProvider = new DictionaryDataProvider(); 
    }

    public function tearDown(){ }

    public function testGetSlang()
    {
        $slangs = $this->slangProvider->getSlangs();
        $this->assertTrue(count($slangs) === 2);
    }

    public function testCreateSlang()
    {
        $slangs = $this->slangProvider->getSlangs();
        $this->assertTrue(count($slangs) === 2);
        $this->slangProvider->createSlang("Poa", "means cool in Swahili", "That concert was fucking poa!!");
        $slangs = $this->slangProvider->getSlangs();
        $this->assertTrue(count($slangs) === 3);
        $poaSlang = $this->slangProvider->getSlang("Poa");
        $this->assertEquals($poaSlang['description'], "means cool in Swahili");
    }

    public function testUpdateSlang()
    {
        $slangs = $this->slangProvider->getSlangs();
        $this->assertTrue(count($slangs) === 2);

        $ginja = $this->slangProvider->getSlang("Ginja");
        $this->assertEquals($ginja["description"], "So much energy!");

        $this->slangProvider->updateSlang("Ginja", ["description" => "wawa"]);
        $ginja = $this->slangProvider->getSlang("Ginja");
        $this->assertEquals($ginja["description"], "wawa");
    }

    /**
    * @expectedException Nadayar\SlangDoesNotExist
    */
    public function testDelete()
    {
        $slangs = $this->slangProvider->getSlangs();
        $this->assertTrue(count($slangs) === 2);

        $ginja = $this->slangProvider->getSlang("Ginja");
        $this->assertEquals($ginja["description"], "So much energy!");

        $this->slangProvider->deleteSlang("Ginja");
        $this->slangProvider->getSlang("Ginja");
    }
}
?>