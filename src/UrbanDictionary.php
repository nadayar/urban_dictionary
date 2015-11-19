<?php

namespace Nadayar;

Class UrbanDictionary 
{
    private $dataProvider;

    public function __construct(DictionaryDataProvider $dataProvider, WordRankings $rankingUtils) 
    {
        $this->dataProvider = $dataProvider;
        $this->rankingUtils = $rankingUtils;
    }

    public function getAllSlangs()
    {
        return $this->dataProvider->getSlangs();
    }

    public function getSlangById($slangId)
    {
        return $this->dataProvider->getSlang($slangId);
    } 

    public function createSlang($slangId, $slangDescription, $slangExample)
    {
        return $this->dataProvider->createSlang($slangId, $slangDescription, $slangExample);
    }

    public function updateSlang($slangId, $body)
    {
        return $this->dataProvider->updateSlang($slangId, $body);
    }

    public function deleteSlang($slangId)
    {
        return $this->dataProvider->deleteSlang($slangId);
    }

    public function getRankings($slangId)
    {
        $slang = $this->getSlangById($slangId);
        $rankings = $this->rankingUtils->getRankings($slang['sample-sentence']);
        return $rankings;
    }
}