<?php


namespace Ta9to\RiotGamesApi\Apis\Champion;


use Ta9to\RiotGamesApi\Apis\Api;
use Ta9to\RiotGamesApi\Domain\Object\ApiResponse;

class Champion extends Api
{
    public function rotation():ApiResponse
    {
        $path = "lol/platform/v3/champion-rotations";
        return $this->call($path);
    }
}