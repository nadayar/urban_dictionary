<?php

namespace Nadayar;

Class UrbanDictionary 
{
    private $dataManager;

    public function __construct(DictionaryDataManager $dataManager, WordRankings $rankingUtils) 
    {
        $this->dataManager = $dataManager;
        $this->rankingUtils = $rankingUtils;
    }

    public function getAllSlangs()
    {
        return $this->dataManager->getSlangs();
    }

    public function getSlangById($slangId)
    {
        return $this->dataManager->getOneSlang($slangId);
    } 

    public function createSlang($slangId, $slangDescription, $slangExample)
    {
        return $this->dataManager->createSlang($slangId, $slangDescription, $slangExample);
    }

    public function updateSlang($slangId, $body)
    {
        return $this->dataManager->updateSlang($slangId, $body);
    }

    public function deleteSlang($slangId)
    {
        return $this->dataManager->deleteSlang($slangId);
    }

    public function getRankings($slangId)
    {
        $slang = $this->getSlangById($slangId);
        $this->rankingUtils->setRankings($slang['sample-sentence']);
        $rankings = $this->rankingUtils->getRankings();

        return $rankings;
    }
}