<?php

namespace Ta9to\RiotGamesApi\Tests;

use PHPUnit\Framework\TestCase;
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
}