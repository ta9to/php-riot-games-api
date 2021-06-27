<?php


namespace Ta9to\RiotGamesApi\Apis\Champion;


use Ta9to\RiotGamesApi\Apis\Api;
use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

class MasteryApi extends Api
{
    public function bySummoner(string $encryptedSummonerId, string $championId=null):ApiResponse
    {
        $path = "lol/champion-mastery/v4/champion-masteries/by-summoner/{$encryptedSummonerId}";
        if ($championId)
            $path .= "/by-champion/{$championId}";
        return $this->call($path);
    }

    public function scoresBySummoner(string $encryptedSummonerId):ApiResponse
    {
        $path = "lol/champion-mastery/v4/scores/by-summoner/{$encryptedSummonerId}";
        return $this->call($path);
    }
}