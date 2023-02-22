<?php

namespace Imran\DataConverter;

use Imran\DataConverter\Contract\ConverterInterface;

abstract class AbstractDataConverter implements ConverterInterface
{
    /**
     * Helper function for arrayToXml
     *
     * @param array $array Array to be converted to XML
     * @param \SimpleXMLElement $xml SimpleXMLElement object to hold the XML data
     */
    protected function arrayToXmlHelper(array $array, \SimpleXMLElement &$xml): void
    {
        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $key = 'item';
            }
            if (is_array($value)) {
                $subnode = $xml->addChild("$key");
                $this->arrayToXmlHelper($value, $subnode);
            } else {
                $xml->addChild("$key", "$value");
            }
        }
    }

    /**
     * Check if a string is a valid JSON string
     *
     * @param mixed $string String to check
     * @return bool True if the string is a valid JSON string, false otherwise
     */
    protected function isJson(mixed $string): bool
    {
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * Check if a string is a valid XML string
     *
     * @param mixed $string String to check
     * @return bool True if the string is a valid XML string, false otherwise
     */
    protected function isXml(mixed $string): bool
    {
        libxml_use_internal_errors(true);
        $doc = simplexml_load_string($string);
        return !($doc === false);
    }
}
