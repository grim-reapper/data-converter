<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface CsvToTableInterface
{
    /**
     * Converts a CSV string to a table (2D array)
     *
     * @param string $csv CSV data to be converted
     * @param string $delimiter Delimiter used in the CSV data
     * @param string $enclosure Enclosure used in the CSV data
     *
     * @return array Table representation of the CSV string
     */
    public function csvToTable(string $csv, string $delimiter = ',', string $enclosure = '"'): array;

}
