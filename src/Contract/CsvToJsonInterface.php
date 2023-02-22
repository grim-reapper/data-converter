<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface CsvToJsonInterface
{
    /**
     * Converts CSV data to JSON
     *
     * @param string $csv CSV data
     * @param string $delimiter Delimiter used in the CSV data
     * @param string $enclosure Enclosure used in the CSV data
     * @param string $escape Escape character used in the CSV data
     * @param  int  $prettify Pretty print generated json data
     * @return string JSON representation of the CSV data
     */
    public function csvToJson(string $csv, string $delimiter = ',', string $enclosure = '"', string $escape = '\\', int $prettify = JSON_PRETTY_PRINT): string;
}
