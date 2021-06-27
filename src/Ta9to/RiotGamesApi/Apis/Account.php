<?php


namespace Ta9to\RiotGamesApi\Apis;


use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

class Account
{
    private const FORMAT = 'https://%s.api.riotgames.com/%s?api_key=%s';

    /** @var string */
    private string $region;
    /** @var string */
    private string $apiKey;

    public function __construct(string $region, string $apiKey)
    {
        $this->region = $region;
        $this->apiKey = $apiKey;
    }

    private function call(string $path):ApiResponse
    {
        $url = sprintf(self::FORMAT, $this->region, $path, $this->apiKey);
        $response = file_get_contents($url);
        return new ApiResponse($response);
    }

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