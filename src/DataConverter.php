<?php
declare(strict_types=1);

namespace Codex\DataConverter;
/**
 * Class DataConverter
 * Converts data between different formats
 */
class DataConverter extends AbstractDataConverter
{
    /**
     * Converts an array to CSV data
     *
     * @param array $array Array to be converted to CSV
     * @param string $delimiter Delimiter to be used in the CSV data
     * @param string $enclosure Enclosure to be used in the CSV data
     * @return string CSV representation of the array
     */
    public function arrayToCsv(array $array, string $delimiter = ',', string $enclosure = '"'): string
    {
        $header = array_keys($array[0]);
        $csv = $enclosure . implode($enclosure . $delimiter . $enclosure, $header) . $enclosure . "\n";
        foreach ($array as $row) {
            $csv .= $enclosure . implode($enclosure . $delimiter . $enclosure, $row) . $enclosure . "\n";
        }
        return trim($csv);
    }


    /**
     * Converts CSV data to an array
     *
     * @param string $csv CSV data
     * @param string $delimiter Delimiter used in the CSV data
     * @param string $enclosure Enclosure used in the CSV data
     * @param string $escape Escape character used in the CSV data
     * @return array Array representation of the CSV data
     */
    public function csvToArray(string $csv, string $delimiter = ',', string $enclosure = '"', string $escape = '\\'): array
    {
        $lines = explode("\n", $csv);
        $header = str_getcsv(array_shift($lines), $delimiter, $enclosure, $escape);
        $data = [];
        foreach ($lines as $line) {
            if (empty(trim($line))) {
                continue;
            }
            $row = array_combine($header, str_getcsv($line, $delimiter, $enclosure, $escape));
            $data[] = $row;
        }
        return $data;
    }

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
    public function csvToJson(string $csv, string $delimiter = ',', string $enclosure = '"', string $escape = '\\', int $prettify = JSON_PRETTY_PRINT): string
    {
        return json_encode($this->csvToArray($csv, $delimiter, $enclosure, $escape), $prettify ?? null);
    }

    /**
     * Converts JSON to CSV data
     *
     * @param string $json JSON data
     * @param string $delimiter Delimiter to be used in the CSV data
     * @param string $enclosure Enclosure to be used in the CSV data
     * @return string CSV representation of the JSON data
     */
    public function jsonToCsv(string $json, string $delimiter = ',', string $enclosure = '"'): string
    {
        return $this->arrayToCsv(json_decode($json, true), $delimiter, $enclosure);
    }

    /**
     * Converts an array to JSON
     *
     * @param array $array Array to be converted to JSON
     * @return string JSON representation of the array
     */
    public function arrayToJson(array $array): string
    {
        return json_encode($array, JSON_PRETTY_PRINT);
    }

    /**
     * Converts JSON to an array
     *
     * @param string $json JSON data
     * @return array Array representation of the JSON data
     */
    public function jsonToArray(string $json): array
    {
        if(!$this->isJson($json)){
            throw new \Exception('Provide a valid json data');
        }
        return json_decode($json, true);
    }

    /**
     * Converts XML data to an array
     *
     * @param string $xml XML data
     * @return array Array representation of the XML data
     */
    public function xmlToArray(string $xml): array
    {
        return json_decode(json_encode(simplexml_load_string($xml)), true);
    }

    /**
     * Converts an array to XML data
     *
     * @param array $array Array to be converted to XML
     * @param string $root Root element for the XML data
     * @return string XML representation of the array
     */
    public function arrayToXml(array $array, string $root = 'root'): string
    {
        $xml = new \SimpleXMLElement("<?xml version=\"1.0\" encoding=\"UTF-8\"?><$root></$root>");
        $this->arrayToXmlHelper($array, $xml);
        return $xml->asXML();
    }

    /**
     * Converts XML data to JSON
     *
     * @param string $xml XML data
     * @return string JSON representation of the XML data
     */
    public function xmlToJson(string $xml): string
    {
        return json_encode($this->xmlToArray($xml), JSON_PRETTY_PRINT);
    }

    /**
     * Converts JSON to XML data
     *
     * @param string $json JSON data
     * @param string $root Root element for the XML data
     * @return string XML representation of the JSON data
     */
    public function jsonToXml(string $json, string $root = 'root'): string
    {
        return $this->arrayToXml(json_decode($json, true), $root);
    }

    /**
     * Converts a CSV string to a table (2D array)
     *
     * @param string $csv CSV string
     * @param string $delimiter Delimiter used in the CSV string
     * @param string $enclosure Enclosure used in the CSV string
     * @return array Table representation of the CSV string
     */
    public function csvToTable(string $csv, string $delimiter = ',', string $enclosure = '"'): array
    {
        return $this->csvToArray($csv, $delimiter, $enclosure);
    }

    /**
     * Converts a table (2D array) to a CSV string
     *
     * @param array $table Table to be converted to CSV
     * @param string $delimiter Delimiter to be used in the CSV string
     * @param string $enclosure Enclosure to be used in the CSV string
     * @return string CSV representation of the table
     */
    public function tableToCsv(array $table, string $delimiter = ',', string $enclosure = '"'): string
    {
        $header = array_keys($table[0]);
        $csv = $enclosure . implode($enclosure . $delimiter . $enclosure, $header) . $enclosure . "\n";
        foreach ($table as $row) {
            $csv .= $enclosure . implode($enclosure . $delimiter . $enclosure, $row) . $enclosure . "\n";
        }
        return trim($csv);
    }

    /**
     * Converts a JSON string to a table (2D array)
     *
     * @param string $json JSON string
     * @return array Table representation of the JSON string
     */
    public function jsonToTable(string $json): array
    {
        return json_decode($json, true);
    }

    /**
     * Converts a table (2D array) to a JSON string
     *
     * @param array $table Table to be converted to JSON
     * @return string JSON representation of the table
     */
    public function tableToJson(array $table): string
    {
        return json_encode($table, JSON_PRETTY_PRINT);
    }

    /**
     * Converts an array to a serialized string
     *
     * @param array $array Array to be serialized
     * @return string Serialized string representation of the array
     */
    public function serialize(array $array): string
    {
        return serialize($array);
    }

    /**
     * Converts a serialized string to an array
     *
     * @param string $serialized Serialized string
     * @return array Array representation of the serialized string
     */
    public function unserialize(string $serialized): array
    {
        return unserialize($serialized);
    }

    /**
     * Converts a YAML string to an array
     *
     * @param string $yaml YAML string
     * @return array Array representation of the YAML string
     */
    public function yamlToArray(string $yaml): array
    {
        return yaml_parse($yaml);
    }

    /**
     * Converts an array to a YAML string
     *
     * @param array $array Array to be converted to YAML
     * @return string YAML string representation of the array
     */
    public function arrayToYaml(array $array): string
    {
        return yaml_emit($array);
    }

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
    public function csvToXml(string $csv, string $root_element = 'root', string $row_element = 'row', string $delimiter = ',', string $enclosure = '"'): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<' . $root_element . '>' . PHP_EOL;
        $table = $this->csvToTable($csv, $delimiter, $enclosure);
        foreach ($table as $row) {
            $xml .= '<' . $row_element . '>' . PHP_EOL;
            foreach ($row as $key => $col) {
                $xml .= '<'.$key.'>' . htmlspecialchars($col) . '</'.$key.'>' . PHP_EOL;
            }
            $xml .= '</' . $row_element . '>' . PHP_EOL;
        }
        $xml .= '</' . $root_element . '>' . PHP_EOL;
        return $xml;
    }

    /**
     * Converts an XML string to a CSV string
     *
     * @param string $xml XML string
     * @param string $delimiter Delimiter to be used in the CSV string
     * @param string $enclosure Enclosure to be used in the CSV string
     * @return string CSV representation of the XML string
     */
    public function xmlToCsv(string $xml, string $delimiter = ',', string $enclosure = '"'): string
    {
        $table = [];
        $xml = simplexml_load_string($xml);
        foreach ($xml->children() as $row_element) {
            $row = [];
            foreach ($row_element->children() as $col_name => $col_element) {
                $row[$col_name] = (string)$col_element;
            }
            $table[] = $row;
        }
        return $this->tableToCsv($table, $delimiter, $enclosure);
    }
}
