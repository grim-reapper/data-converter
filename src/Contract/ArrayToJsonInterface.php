<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface ArrayToJsonInterface
{
    /**
     * Converts an array to JSON
     *
     * @param array $array Array to be converted to JSON
     * @return string JSON representation of the array
     */
    public function arrayToJson(array $array): string;
}
