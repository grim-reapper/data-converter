<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface JsonToCsvInterface
{
    /**
     * Converts JSON to CSV data
     *
     * @param string $json JSON data
     * @param string $delimiter Delimiter to be used in the CSV data
     * @param string $enclosure Enclosure to be used in the CSV data
     * @return string CSV representation of the JSON data
     */
    public function jsonToCsv(string $json, string $delimiter = ',', string $enclosure = '"'): string;
}
