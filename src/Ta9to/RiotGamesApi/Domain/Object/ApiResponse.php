<?php


namespace Ta9to\RiotGamesApi\Domain\Object;


class ApiResponse
{
    /** @var string  */
    private string $raw;

    public function __construct(string $raw)
    {
        $this->raw = $raw;
    }

    public function __toString()
    {
        return (string)$this->raw;
    }
}