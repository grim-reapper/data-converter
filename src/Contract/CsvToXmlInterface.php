<?php
declare(strict_types=1);

namespace Codex\DataConverter\Contract;

interface CsvToXmlInterface
{
    /**
     * Converts a CSV string to an XML string
     *
     * @param string $csv CSV string
     * @param string $root_element Name of the root element in the XML string
     * @param string $row_element Name of the row element in the XML string
     * @param string $delimiter Delimiter used in the CSV string
     * @param string $enclosure Enclosure used in the CSV string
     * @return string XML representation of the CSV string
     */
    public function csvToXml(string $csv, string $root_element = 'root', string $row_element = 'row', string $delimiter = ',', string $enclosure = '"'): string;
}
