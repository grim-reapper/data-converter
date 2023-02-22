<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface YamlToArrayInterface
{
    /**
     * Convert YAML data to an array.
     *
     * @param string $yaml YAML data to be converted
     *
     * @return array Converted data as an array
     */
    public function yamlToArray(string $yaml): array;

}
