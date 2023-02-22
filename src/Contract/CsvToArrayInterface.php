<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface CsvToArrayInterface
{
    /**
     * Convert CSV data to an array.
     *
     * @param string $csv CSV data to be converted
     * @param string $delimiter Delimiter used in the CSV data
     * @param string $enclosure Enclosure used in the CSV data
     *
     * @return array Converted data as an array
     */
    public function csvToArray(string $csv, string $delimiter = ',', string $enclosure = '"'): array;
}
