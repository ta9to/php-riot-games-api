<?php


namespace Ta9to\RiotGamesApi;

use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

/**
 * @method static seasons
 * @method static queues
 * @method static maps
 * @method static gameModes
 * @method static gameTypes
 */
class GameConstant
{
    private const URL = 'https://static.developer.riotgames.com/docs/lol/%s.json';

    public static function __callStatic($method, $args):ApiResponse
    {
        $url = sprintf(self::URL, $method);
        $response = file_get_contents($url);
        return new ApiResponse($response);
    }
}