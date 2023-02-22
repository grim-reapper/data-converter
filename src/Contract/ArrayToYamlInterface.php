<?php
declare(strict_types=1);

namespace Codex\DataConverter\Contract;

interface ArrayToYamlInterface
{
    /**
     * Convert an array to YAML data.
     *
     * @param array $array Array to be converted
     *
     * @return string Converted data as a YAML string
     */
    public function arrayToYaml(array $array): string;
}
