<?php

namespace Imran\DataConverter\Contract;

interface JsonToArrayInterface
{
    /**
     * Converts JSON to an array
     *
     * @param string $json JSON data
     * @return array Array representation of the JSON data
     */
    public function jsonToArray(string $json): array;
}
