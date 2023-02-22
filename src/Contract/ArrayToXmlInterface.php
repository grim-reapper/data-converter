<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface ArrayToXmlInterface
{
    /**
     * Converts an array to XML data
     *
     * @param array $array Array to be converted to XML
     * @param string $root Root element for the XML data
     * @return string XML representation of the array
     */
    public function arrayToXml(array $array, string $root = 'root'): string;
}
