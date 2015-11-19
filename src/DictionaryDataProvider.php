<?php

namespace Nadayar;

class DictionaryDataProvider 
{

    private $slangs =  [
            "Tight" => [
                "description" => "When someone performs an awesome task",
                "sample-sentence" => "Tight Tight Tight!!!"
            ],
            "Ginja" => [
                "description" => "So much energy!",
                "sample-sentence" => "Why does Prosper have so much ginja?"
            ]            
    ];

    public function getSlangs() 
    {
        return $this->slangs;
    } 
    
    public function getSlang($slangId) 
    {
        if(array_key_exists($slangId, $this->slangs))
        {
            $slang = $this->slangs[$slangId];
            return $slang;
        } else {
            throw new SlangDoesNotExist("Cant Find Slang");          
        }
    } 

    public function createSlang($slangId, $slangDescription, $slangExample) {
        $newSlangBody = ["description" => $slangDescription, "sample-sentence" => $slangExample];
        $this->slangs[$slangId] = $newSlangBody;
        return $this->slangs[$slangId];
    }    

    public function updateSlang($slangId, $body) {
        if(array_key_exists("description", $body))
        {
            $this->slangs[$slangId]["description"] = $body["description"];
        }
        if(array_key_exists("sample-sentence", $body))
        {
            $this->slangs[$slangId]["sample-sentence"] = $body["sample-sentence"];
        } 

        return $this->slangs[$slangId];
    } 

    public function deleteSlang($slangId) {
        unset($this->slangs[$slangId]);
    } 
}