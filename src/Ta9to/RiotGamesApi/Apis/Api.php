<?php


namespace Ta9to\RiotGamesApi\Apis;


use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

abstract class Api
{
    protected const FORMAT = 'https://%s.api.riotgames.com/%s?api_key=%s';

    /** @var string */
    private string $region;
    /** @var string */
    private string $apiKey;

    public function __construct(string $region, string $apiKey)
    {
        $this->region = $region;
        $this->apiKey = $apiKey;
    }

    protected function call(string $path):ApiResponse
    {
        $url = sprintf(self::FORMAT, $this->region, $path, $this->apiKey);
        $response = file_get_contents($url);
        return new ApiResponse($response);
    }
}