<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface JsonToXmlInterface
{
    /**
     * Converts JSON to XML data
     *
     * @param string $json JSON data
     * @param string $root Root element for the XML data
     * @return string XML representation of the JSON data
     */
    public function jsonToXml(string $json, string $root = 'root'): string;
}
