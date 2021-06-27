<?php


namespace Ta9to\RiotGamesApi;

use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

/**
 * @method static versions
 * @method static regions
 * @method static realms
 * @method static br
 * @method static eune
 * @method static euw
 * @method static garena
 * @method static jp
 * @method static kr
 * @method static lan
 * @method static las
 * @method static na
 * @method static oce
 * @method static pbe
 * @method static ru
 * @method static tencent
 * @method static tr
 * @method static tw
 * @method static languages
 * @method static champion
 * @method static item
 * @method static summoner
 * @method static profileicon
 */
class DataDragon
{
    private const FORMAT = 'https://ddragon.leagueoflegends.com/%s/%s.json';

    private static function pathByMethod(string $method, array $args):string
    {
        switch ($method) {
            case 'versions':
            case 'realms':
                return 'api';
            case 'br':
            case 'eune':
            case 'euw':
            case 'garena':
            case 'jp':
            case 'kr':
            case 'lan':
            case 'las':
            case 'na':
            case 'oce':
            case 'pbe':
            case 'ru':
            case 'tencent':
            case 'tr':
            case 'tw':
                return 'realms';
            case 'languages':
                return 'cdn';
            case 'champion':
            case 'item':
            case 'summoner':
            case 'profileicon':
                return "cdn/{$args[0]}/data/{$args[1]}";
            default:
                return '';
        }
    }

    private static function call($url):string
    {
        return file_get_contents($url);
    }

    public static function __callStatic($method, $args):ApiResponse
    {
        $url = sprintf(self::FORMAT, self::pathByMethod($method, $args), $method);
        $response = self::call($url);
        return new ApiResponse($response);
    }
}