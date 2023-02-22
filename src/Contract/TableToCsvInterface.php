<?php

namespace Imran\DataConverter\Contract;

interface TableToCsvInterface
{
    /**
     * Converts a table (2D array) to a CSV string
     *
     * @param array $table Table to be converted to CSV
     * @param string $delimiter Delimiter to be used in the CSV string
     * @param string $enclosure Enclosure to be used in the CSV string
     * @return string CSV representation of the table
     */
    public function tableToCsv(array $table, string $delimiter = ',', string $enclosure = '"'): string;
}
