<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface XmlToCsvInterface
{
    /**
     * Converts an XML string to a CSV string
     *
     * @param string $xml XML string
     * @param string $delimiter Delimiter to be used in the CSV string
     * @param string $enclosure Enclosure to be used in the CSV string
     * @return string CSV representation of the XML string
     */
    public function xmlToCsv(string $xml, string $delimiter = ',', string $enclosure = '"'): string;
}
