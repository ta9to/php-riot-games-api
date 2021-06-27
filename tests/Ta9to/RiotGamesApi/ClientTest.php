<?php

namespace Ta9to\RiotGamesApi\Tests;

use PHPUnit\Framework\TestCase;
use Ta9to\RiotGamesApi\Apis\AccountApi;
use Ta9to\RiotGamesApi\Apis\Champion\Champion;
use Ta9to\RiotGamesApi\Apis\Champion\MasteryApi;
use Ta9to\RiotGamesApi\Apis\SummonerApi;
use Ta9to\RiotGamesApi\DataDragon;
use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;
use Ta9to\RiotGamesApi\GameConstant;

class ClientTest extends TestCase
{
    public function gameConstantMethods()
    {
        return [
            ['seasons'],
            ['queues'],
            ['maps'],
            ['gameModes'],
            ['gameTypes'],
        ];
    }

    /**
     * @dataProvider gameConstantMethods
     * @param $method
     */
    public function testGameConstant($method)
    {
        $tmp = GameConstant::$method();
        $this->assertInstanceOf(ApiResponse::class, $tmp);
        $this->assertIsString((string)$tmp);
    }

    public function dataDragonMethods()
    {
        return [
            ['versions'],
            ['realms'],
            ['br'],
            ['eune'],
            ['euw'],
            ['garena'],
            ['jp'],
            ['kr'],
            ['lan'],
            ['las'],
            ['na'],
            ['oce'],
            ['pbe'],
            ['ru'],
            ['tencent'],
            ['tr'],
            ['tw'],
            ['languages'],
            ['champion', '11.13.1', 'en_US'],
            ['item', '11.13.1', 'en_US'],
            ['summoner', '11.13.1', 'en_US'],
            ['profileicon', '11.13.1', 'en_US'],
        ];
    }

    /**
     * @dataProvider dataDragonMethods
     * @param $method
     */
    public function testDataDragon($method, $version=null, $language=null)
    {
        $apiResponse = DataDragon::$method($version, $language);
        $this->assertInstanceOf(ApiResponse::class, $apiResponse);
        $this->assertIsString((string)$apiResponse);
    }

    public function testAccount()
    {
        $account = new AccountApi('asia', getenv('RIOT_API_KEY'));
        $response = $account->byRiotId('ta9to', '0901');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $account->byPuuid('QuefbaBTHQ-wmTNdvNN9Il3x1pYl6h0Q2GWFFqeTDuG8_MTUWoSZcNetUSf6WyTki0DxI7jTp7ZSUQ');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $account->activeShards('val', 'QuefbaBTHQ-wmTNdvNN9Il3x1pYl6h0Q2GWFFqeTDuG8_MTUWoSZcNetUSf6WyTki0DxI7jTp7ZSUQ');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);
    }

    public function testChampionMastery()
    {
        $this->markTestSkipped('save request freq');
        
        $championMastery = new MasteryApi('jp1', getenv('RIOT_API_KEY'));
        $response = $championMastery->bySummoner('I9c7LNtijU3gyCJVJBcjbshaLtKlktGjatM3oPUw3qCtuw');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $championMastery->bySummoner('I9c7LNtijU3gyCJVJBcjbshaLtKlktGjatM3oPUw3qCtuw', 245);
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $championMastery->scoresBySummoner('I9c7LNtijU3gyCJVJBcjbshaLtKlktGjatM3oPUw3qCtuw');
        $this->assertInstanceOf(ApiResponse::class, $response);
    }

    public function testChampion()
    {
        $champion = new Champion('jp1', getenv('RIOT_API_KEY'));
        $response = $champion->rotation();
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);
    }

    public function testSummoner()
    {
        $summoner = new SummonerApi('jp1', getenv('RIOT_API_KEY'));

        $response = $summoner->byEncryptedAccountId('cGasU_Xr4xsD9nhsaV8-RJwb7KPECrb89ya3JYBTdrT55GM');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $summoner->bySummonerName('ta9to');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $summoner->byEncryptedPUUID('QuefbaBTHQ-wmTNdvNN9Il3x1pYl6h0Q2GWFFqeTDuG8_MTUWoSZcNetUSf6WyTki0DxI7jTp7ZSUQ');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);

        $response = $summoner->byEncryptedSummonerId('I9c7LNtijU3gyCJVJBcjbshaLtKlktGjatM3oPUw3qCtuw');
        $this->assertInstanceOf(ApiResponse::class, $response);
        $this->assertIsString((string)$response);
    }
}