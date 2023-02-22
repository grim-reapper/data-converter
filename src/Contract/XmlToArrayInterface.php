<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface XmlToArrayInterface
{
    /**
     * Converts XML data to an array
     *
     * @param string $xml XML data
     * @return array Array representation of the XML data
     */
    public function xmlToArray(string $xml): array;
}
