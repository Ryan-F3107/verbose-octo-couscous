<?php

/*
 * The PlayerController file would contain Read and Write functions that would interact with the Model file to grab the
 * data and send it to the PlayerView file.
 */

include_once 'PlayerModel.php';

//interface just for the read function
interface IReadPlayers {
    function readPlayers($source, $filename = null);
}

// interface just for the write function
interface IWritePlayers {
    function writePlayer($source, $player, $filename = null);
}

class ReadPlayer extends PlayerModel implements IReadPlayers {

    /**
     * @param $source string Where we're retrieving the data from. 'json', 'array' or 'file'
     * @param $filename string Only used if we're reading players in 'file' mode.
     * @return string json
     */
    function readPlayers($source, $filename = null) {
        $playerData = null;

        switch ($source) {
            case 'array':
                $playerData = $this->getPlayerDataArray();
                break;
            case 'json':
                $playerData = $this->getPlayerDataJson();
                break;
            case 'file':
                $playerData = $this->getPlayerDataFromFile($filename);
                break;
        }

        if (is_string($playerData)) {
            $playerData = json_decode($playerData);
        }

        return $playerData;
    }

}

class WritePlayer extends PlayerModel implements IWritePlayers {
    private $playersArray;

    private $playerJsonString;

    public function __construct() {
        //We're only using this if we're storing players as an array.
        $this->playersArray = [];

        //We'll only use this one if we're storing players as a JSON string
        $this->playerJsonString = null;
    }

    /**
     * @param $source string Where to write the data. 'json', 'array' or 'file'
     * @param $filename string Only used if we're writing in 'file' mode
     * @param $player \stdClass Class implementation of the player with name, age, job, salary.
     */
    function writePlayer($source, $player, $filename = null) {
        switch ($source) {
            case 'array':
                $this->playersArray[] = $player;
                break;
            case 'json':
                $players = [];
                if ($this->playerJsonString) {
                    $players = json_decode($this->playerJsonString);
                }
                $players[] = $player;
                $this->playerJsonString = json_encode($player);
                break;
            case 'file':
                $players = json_decode($this->getPlayerDataFromFile($filename));
                if (!$players) {
                    $players = [];
                }
                $players[] = $player;
                file_put_contents($filename, json_encode($players));
                break;
        }
    }
}