<?php

namespace Nadayar;

Class WordRankings 
{

    private $rankingObject = [];

    public function setRankings($sentence)
    {
        $this->computeRankings($sentence);
    }

    private function addWordsToRankingObject($sentence)
    {
        $sentence_array = explode(" ", $sentence);
        foreach ($sentence_array as $word) {
            if(array_key_exists($word, $this->rankingObject))
            {
                $this->rankingObject[$word] = $this->rankingObject[$word] + 1;
            } else {
                $this->rankingObject[$word] = 1;
            }
        }
    }

    private function sortRankings()
    {
        arsort($this->rankingObject);
    }

    private function computeRankings($sentence)
    {
        $this->addWordsToRankingObject($sentence);
        $this->sortRankings();
    }

    public function getRankings()
    {
        return $this->rankingObject;
    }
}