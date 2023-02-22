<?php
declare(strict_types=1);

namespace Codex\DataConverter\Contract;

interface ArrayToCsvInterface
{
    /**
     * Convert an array to CSV data.
     *
     * @param array $array Array to be converted
     * @param string $delimiter Delimiter to be used in the CSV data
     * @param string $enclosure Enclosure to be used in the CSV data
     *
     * @return string Converted data as a CSV string
     */
    public function arrayToCsv(array $array, string $delimiter = ',', string $enclosure = '"'): string;
}
