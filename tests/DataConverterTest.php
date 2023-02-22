<?php

namespace Imran\DataConverter\Tests;

use Imran\DataConverter\DataConverter;
use PHPUnit\Framework\TestCase;

class DataConverterTest extends TestCase
{
    private DataConverter $dataConverter;
    private string $csvData;
    private string $jsonData;
    private string $xmlData;
    private array $arrayData;

    protected function setUp(): void
    {
        $this->dataConverter = new DataConverter();
        $this->csvData = "name,email,phone\nJohn Doe,johndoe@example.com,1234567890\nJane Doe,janedoe@example.com,0987654321";
        $this->jsonData = '[{"name":"John Doe","email":"johndoe@example.com","phone":"1234567890"},{"name":"Jane Doe","email":"janedoe@example.com","phone":"0987654321"}]';
        $this->xmlData = "<?xml version='1.0' encoding='UTF-8'?><root><item><name>John Doe</name><email>johndoe@example.com</email><phone>1234567890</phone></item><item><name>Jane Doe</name><email>janedoe@example.com</email><phone>0987654321</phone></item></root>";
        $this->arrayData = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890'
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'phone' => '0987654321'
            ]
        ];
    }

    /**
     * @group csvToArray
     * @return void
     */
    public function testCsvToArray()
    {
        $this->assertEquals($this->arrayData, $this->dataConverter->csvToArray($this->csvData));
    }

    /**
     * @group arrayToCsv
     * @return void
     */
    public function testArrayToCsv()
    {
        $this->assertEquals($this->csvData, $this->dataConverter->arrayToCsv($this->arrayData, ',', ''));
    }

    /**
     * @group csvToJson
     * @return void
     */
    public function testCsvToJson()
    {
        $this->assertEquals($this->jsonData, $this->dataConverter->csvToJson($this->csvData, prettify: 0));
    }

    /**
     * @group jsonToCsv
     * @return void
     */
    public function testJsonToCsv()
    {
        $this->assertEquals($this->csvData, $this->dataConverter->jsonToCsv($this->jsonData, enclosure: ''));
    }

    /**
     * @group xmlToCsv
     * @return void
     */
    public function testXmlToCsv()
    {
        $this->assertEquals($this->csvData, $this->dataConverter->xmlToCsv($this->xmlData, enclosure: ''));
    }

    /**
     * @group arrayToJson
     * @return void
     */
    public function testArrayToJson()
    {
        $prettify = json_encode(json_decode($this->jsonData), JSON_PRETTY_PRINT);
        $this->assertEquals($prettify, $this->dataConverter->arrayToJson($this->arrayData));
    }

    /**
     * @group jsonToArray
     * @return void
     */
    public function testJsonToArray()
    {
        $expected = [
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone' => '1234567890'
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'phone' => '0987654321'
            ]
        ];
        $this->assertEquals($expected, $this->dataConverter->jsonToArray($this->jsonData));
    }

    /**
     * @group xmlToArray
     * @return void
     */
    public function testXmlToArray()
    {
        $this->assertEquals($this->arrayData, $this->dataConverter->xmlToArray($this->xmlData)['item']);
    }

    /**
     * @group arrayToXml
     * @return void
     */
    public function testArrayToXml()
    {
        $data = $this->dataConverter->arrayToXml($this->arrayData);
        // replace new line and double quotes to pass the test.
        $data = str_replace("\n", '', $data);
        $data = str_replace('"', "'", $data);
        $this->assertEquals($this->xmlData, $data);
    }

    /**
     * @group unserialize
     * @return void
     */
    public function testUnserialize()
    {
        $data = ['name' => 'John', 'age' => 30, 'city' => 'New York'];
        $serialized = serialize($data);

        $result = $this->dataConverter->unserialize($serialized);
        $this->assertEquals($data, $result);
    }

    /**
     * @group serialize
     * @return void
     */
    public function testSerialize()
    {
        $data = ['name' => 'John', 'age' => 30, 'city' => 'New York'];

        $result = $this->dataConverter->serialize($data);
        $this->assertEquals(serialize($data), $result);
    }

    /**
     * @group yamlToArray
     * @return void
     */
    public function testYamlToArray()
    {
        $yaml = "name: John\nage: 30\ncity: New York\n";

        $result = $this->dataConverter->yamlToArray($yaml);
        $this->assertEquals(['name' => 'John', 'age' => 30, 'city' => 'New York'], $result);
    }

    /**
     * @group arrayToYaml
     * @return void
     */
    public function testArrayToYaml()
    {
        $data = ['name' => 'John', 'age' => 30, 'city' => 'New York'];

        $result = $this->dataConverter->arrayToYaml($data);
        $expected = "---\nname: John\nage: 30\ncity: New York\n...\n";
        $this->assertEquals($expected, $result);
    }

    /**
     *
     * @group csvToTable
     * @return void
     */
    public function testCsvToTable()
    {
        $csv = "name,age,city\nJohn,30,New York\nJane,25,London\n";

        $result = $this->dataConverter->csvToTable($csv);
        $this->assertEquals([['name' => 'John', 'age' => 30, 'city' => 'New York'], ['name' => 'Jane', 'age' => 25, 'city' => 'London']], $result);
    }

    /**
     * @group tableToCsv
     * @return void
     */
    public function testTableToCsv()
    {
        $data = [['name' => 'John', 'age' => 30, 'city' => 'New York'], ['name' => 'Jane', 'age' => 25, 'city' => 'London']];

        $result = $this->dataConverter->tableToCsv($data, enclosure: '');
        $expected = "name,age,city\nJohn,30,New York\nJane,25,London";
        $this->assertEquals($expected, $result);
    }

    /**
     * @group jsonToTable
     * @return void
     */
    public function testJsonToTable() {
        $json = '{"first_name":"John","last_name":"Doe","email":"johndoe@example.com"}';
        $expected = [
            "first_name" => "John",
            "last_name" => "Doe",
            "email" => "johndoe@example.com",
        ];

        $result = $this->dataConverter->jsonToTable($json);

        $this->assertEquals($expected, $result);
    }

    /**
     *
     * @group csvToXml
     * @return void
     */
    public function testCsvToXml()
    {
        $data = $this->dataConverter->csvToXml($this->csvData, row_element: 'item');
        $data = str_replace("\r\n", '', $data);
        $data = str_replace('"', "'", $data);
        $this->assertEquals($this->xmlData, $data);
    }
}
