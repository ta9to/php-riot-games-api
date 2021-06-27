<?php


namespace Ta9to\RiotGamesApi\Apis;


use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

class AccountApi extends Api
{
    public function byPuuid(string $puuid):ApiResponse
    {
        $path = "riot/account/v1/accounts/by-puuid/{$puuid}";
        return $this->call($path);
    }

    public function byRiotId(string $gameName, string $tagLine):ApiResponse
    {
        $path = "riot/account/v1/accounts/by-riot-id/{$gameName}/{$tagLine}";
        return $this->call($path);
    }

    public function activeShards(string $game, string $puuid):ApiResponse
    {
        $path = "riot/account/v1/active-shards/by-game/{$game}/by-puuid/{$puuid}";
        return $this->call($path);
    }
}