<?php


namespace Ta9to\RiotGamesApi\Apis;


use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

class SummonerApi extends Api
{
    public function byEncryptedAccountId(string $encryptedAccountId):ApiResponse
    {
        $path = "lol/summoner/v4/summoners/by-account/{$encryptedAccountId}";
        return $this->call($path);
    }

    public function bySummonerName(string $summonerName):ApiResponse
    {
        $path = "lol/summoner/v4/summoners/by-name/{$summonerName}";
        return $this->call($path);
    }

    public function byEncryptedPUUID(string $encryptedPUUID):ApiResponse
    {
        $path = "lol/summoner/v4/summoners/by-puuid/{$encryptedPUUID}";
        return $this->call($path);
    }

    public function byEncryptedSummonerId(string $encryptedSummonerId):ApiResponse
    {
        $path = "lol/summoner/v4/summoners/{$encryptedSummonerId}";
        return $this->call($path);
    }

}