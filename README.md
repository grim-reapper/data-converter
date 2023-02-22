# DataConverter Class

The DataConverter class provides a simple and convenient way to convert data from one format to another. Whether you need to convert a CSV file to JSON, or an array to YAML, this class has you covered. The supported formats include CSV, JSON, XML, YAML, serialized PHP data, and PHP objects.

This class has a user-friendly interface that allows you to easily convert data in either a string or file format. Additionally, it has several methods that allow you to fine-tune the conversion process, such as specifying custom root elements and row elements for XML conversions.

With its comprehensive set of conversion methods, the DataConverter class is a must-have tool for any PHP developer. Whether you're working on a small personal project or a large enterprise application, this class can help you simplify your data conversion needs.

## Features
- Converts CSV to Array
- Converts Array to CSV
- Converts CSV to JSON
- Converts JSON to CSV
- Converts JSON to Array
- Converts Array to JSON
- Converts XML to Array
- Converts Array to XML
- Converts XML to JSON
- Converts JSON to XML
- Converts Array to Serialize
- Converts Serialize to Array
- Converts Yaml to Array
- Converts Array to Yaml
- Convert CSV to XML
- Converts XML To CSV

## Requirements
- PHP 8.0 or Higher
- PHP XML Extension: `ext-simplexml`
- PHP Yaml Extension: `ext-yaml`

## Installation
First, include the DataConverter.php class in your project.
```php
require_once 'path/to/DataConverter.php';
```
or by using composer `Recommended way`

```php
composer require codex/data-converter
```
## Usage

Then, create an instance of the DataConverter class:
```php
use Codex\DataConverer\DataConverer;

$dataConverter = new DataConverter();
```
## Methods

### CSV to Array

```php
$csvData = "name,email,phone
John Doe,johndoe@example.com,1234567890
Jane Doe,janedoe@example.com,0987654321";

$arrayData = $dataConverter->csvToArray($csvData);
print_r($arrayData);
```
##### OUTPUT
```php
Array
(
    [0] => Array
        (
            [name] => John Doe
            [email] => johndoe@example.com
            [phone] => 1234567890
        )

    [1] => Array
        (
            [name] => Jane Doe
            [email] => janedoe@example.com
            [phone] => 0987654321
        )
)

```
### Array to CSV
```php
$arrayData = [
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

$csvData = $dataConverter->arrayToCsv($arrayData);
print_r($csvData);
```
##### OUTPUT
```php
name,email,phone
John Doe,johndoe@example.com,1234567890
Jane Doe,janedoe@example.com,0987654321
```

### JSON to Array
```php
$jsonData = '[{"name":"John Doe","email":"johndoe@example.com","phone":"1234567890"},{"name":"Jane Doe","email":"janedoe@example.com","phone":"0987654321"}]';

$arrayData = $dataConverter->jsonToArray($jsonData);
print_r($arrayData);
```
##### OUTPUT
```php
Array
(
    [0] => Array
        (
            [name] => John Doe
            [email] => johndoe@example.com
            [phone] => 1234567890
        )

    [1] => Array
        (
            [name] => Jane Doe
            [email] => janedoe@example.com
            [phone] => 0987654321
        )
)
```
### Array to JSON
```php
$arrayData = [
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

$jsonData = $dataConverter->arrayToJson($arrayData);
print_r($jsonData);
```
##### OUTPUT
```php
[{"name":"John Doe","email":"johndoe@example.com","phone":"1234567890"},{"name":"Jane Doe","email":"janedoe@example.com","phone":"0987654321"}]
```

### XML to Array
```php
$xmlData = '<root>
    <item>
        <name>John Doe</name>
        <email>johndoe@example.com</email>
        <phone>1234567890</phone>
    </item>
    <item>
        <name>Jane Doe</name>
        <email>janedoe@example.com</email>
        <phone>0987654321</phone>
    </item>
</root>';

$arrayData = $dataConverter->xmlToArray($xmlData);
print_r($arrayData);
```
##### OUTPUT
```php
Array
(
    [items] => Array
    (
        [0] => Array
        (
            [name] => John Doe
            [email] => johndoe@example.com
            [phone] => 1234567890
        )
        
        [1] => Array
        (
            [name] => Jane Doe
            [email] => janedoe@example.com
            [phone] => 0987654321
        )
    )
)
```

### Array to XML
```php
$arrayData = [
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

$xmlData = $dataConverter->arrayToXml($arrayData);
print_r($xmlData);
```
##### OUTPUT
```xml
<root>
  <item>
    <name>John Doe</name>
    <email>johndoe@example.com</email>
    <phone>1234567890</phone>
  </item>
  <item>
    <name>Jane Doe</name>
    <email>janedoe@example.com</email>
    <phone>0987654321</phone>
  </item>
</root>
```

### unserialize
```php
$dataConverter = new DataConverter();
$serializedData = "a:3:{s:4:\"name\";s:8:\"John Doe\";s:5:\"email\";s:17:\"johndoe@example.com\";s:5:\"phone\";s:6:\"123456\";}";
$unserializedData = $dataConverter->unserialize($serializedData, 'serialized');
print_r($unserializedData);
```
##### OUTPUT
```php
Array
(
    [name] => John Doe
    [email] => johndoe@example.com
    [phone] => 123456
)
```

### serialize
```php
$dataConverter = new DataConverter();
$arrayData = array(
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '123456'
);
$serializedData = $dataConverter->serialize($arrayData, 'serialized');
echo $serializedData;
```
##### OUTPUT
```php
a:3:{s:4:"name";s:8:"John Doe";s:5:"email";s:17:"johndoe@example.com";s:5:"phone";s:6:"123456";}
```

### yamlToArray
```php
$dataConverter = new DataConverter();
$yamlData = "name: John Doe
email: johndoe@example.com
phone: 123456";
$arrayData = $dataConverter->yamlToArray($yamlData);
print_r($arrayData);
```
##### OUTPUT
```php
Array
(
    [name] => John Doe
    [email] => johndoe@example.com
    [phone] => 123456
)
```
### arrayToYaml
```php
$dataConverter = new DataConverter();
$arrayData = array(
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '123456'
);
$yamlData = $dataConverter->arrayToYaml($arrayData);
echo $yamlData;
```
##### OUTPUT
```yaml
name: John Doe
email: johndoe@example.com
```
### csvToJson
```php
$csv = "name,age,city\nJohn,30,New York\nJane,25,London";

$json = $dataConverter->csvToJson($csv);

// Output:
// '[{"name":"John","age":"30","city":"New York"},{"name":"Jane","age":"25","city":"London"}]'
```
### jsonToCsv
```php
$json = '[{"name":"John","age":"30","city":"New York"},{"name":"Jane","age":"25","city":"London"}]';

$csv = $dataConverter->jsonToCsv($json);

// Output:
// "name,age,city\nJohn,30,New York\nJane,25,London"
```
### xmlToJson
```php
$xml = '<data>
  <item>
    <name>John</name>
    <age>30</age>
    <city>New York</city>
  </item>
  <item>
    <name>Jane</name>
    <age>25</age>
    <city>London</city>
  </item>
</data>';

$json = $dataConverter->xmlToJson($xml);

// Output:
// '[{"name":"John","age":"30","city":"New York"},{"name":"Jane","age":"25","city":"London"}]'
```
### jsonToXml
The method takes two arguments: the JSON string and an optional root element name (defaults to "root"). The method returns the resulting XML string.
```php
$json = '[{"name":"John","age":"30","city":"New York"},{"name":"Jane","age":"25","city":"London"}]';

$xml = $dataConverter->jsonToXml($json);

// Output:
// '<root>
//   <item>
//     <name>John</name>
//     <age>30</age>
//     <city>New York</city>
//   </item>
//   <item>
//     <name>Jane</name>
//     <age>25</age>
//     <city>London</city>
//   </item>
// </root>'
```
### csvToXml
The csvToXml method converts a CSV string to an XML string.
#### Usage
The method takes three arguments: the CSV string, an optional delimiter
```php
$dataConverter = new DataConverter();
$csv = <<< CSV
id,name,age
1,John Doe,32
2,Jane Doe,29
CSV;

$xml = $dataConverter->csvToXml($csv);
echo $xml;
```
This will produce the following XML output:
```xml
<?xml version="1.0"?>
<rows>
  <row>
    <id>1</id>
    <name>John Doe</name>
    <age>32</age>
  </row>
  <row>
    <id>2</id>
    <name>Jane Doe</name>
    <age>29</age>
  </row>
</rows>
```
You can customize the root element name and row element name by passing the optional second and third arguments to the method. For example:
```php
$xml = $dataConverter->csvToXml($csv, 'persons', 'person');
echo $xml;
```
This will produce the following XML output:
```xml
<?xml version="1.0"?>
<persons>
  <person>
    <id>1</id>
    <name>John Doe</name>
    <age>32</age>
  </person>
  <person>
    <id>2</id>
    <name>Jane Doe</name>
    <age>29</age>
  </person>
</persons>
```

### Running Tests

To run tests, use following command

```shell
.\vendor\bin\phpunit tests/DataConverterTest.php
```

### Hi, I'm Imran Ali! 👋

### 🚀 About Me

Senior **Full-Stack** Developer specializing in front end and back-end development. Experienced with all stages of
the development cycle for dynamic web projects. Innovative, creative and a proven team player, I possess
a Tech Degree in Front End Development and have 7 years building developing and managing websites,
applications and programs for various companies. I seek to secure the position of Senior Full
Stack Developer where i can share my skills, expertise and experience with valuable clients.

### 🛠 Skills

PHP OOP,
Laravel,
Codeigniter
Javascript,
Node,
React,
Vue,
Git,
HTML,
Rest Api,
Typescript,
Angular,
SCSS,
Docker,
CI/CD Jenkins,
Bootstrap,
Responsive Design,
ASP.NET Core

### 🔗 Follow on

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/imranali291/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://twitter.com/imranali125)

### License

[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)
[![AGPL License](https://img.shields.io/badge/license-AGPL-blue.svg)](http://www.gnu.org/licenses/agpl-3.0)

### Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.
