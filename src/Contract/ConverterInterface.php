<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface ConverterInterface extends ArrayToCsvInterface,
                                     ArrayToYamlInterface,
                                     CsvToArrayInterface,
                                     CsvToTableInterface,
                                     JsonToTableInterface,
                                     SerializeInterface,
                                     UnserializeInterface,
                                     TableToCsvInterface,
                                     TableToJsonInterface,
                                     YamlToArrayInterface,
                                     CsvToJsonInterface,
                                     JsonToCsvInterface,
                                     ArrayToJsonInterface,
                                     JsonToArrayInterface,
                                     XmlToArrayInterface,
                                     ArrayToXmlInterface,
                                     XmlToJsonInterface,
                                     JsonToXmlInterface,
                                     CsvToXmlInterface,
                                     XmlToCsvInterface
{

}
