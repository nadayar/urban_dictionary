<?php

namespace Nadayar;

Class WordRankings 
{
    public function getRankings($sentence)
    {
        $rankingObject = [];
        $sentence_array = explode(" ", $sentence);
        foreach ($sentence_array as $word) {
            if(array_key_exists($word, $rankingObject))
            {
                $rankingObject[$word] = $rankingObject[$word] + 1;
            } else {
                $rankingObject[$word] = 1;
            }
        }

        //sort the rankings array
        arsort($rankingObject);

        return $rankingObject;
    }
}