<?php
declare(strict_types=1);

namespace Codex\DataConverter\Contract;

interface XmlToJsonInterface
{
    /**
     * Converts XML data to JSON
     *
     * @param string $xml XML data
     * @return string JSON representation of the XML data
     */
    public function xmlToJson(string $xml): string;
}
