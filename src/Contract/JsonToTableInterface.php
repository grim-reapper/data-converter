<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface JsonToTableInterface
{
    /**
     * Converts a JSON string to a table (2D array)
     *
     * @param string $json
     * @return array
     */
    public function jsonToTable(string $json) : array;
}
