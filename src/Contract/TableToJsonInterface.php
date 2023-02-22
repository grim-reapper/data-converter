<?php
declare(strict_types=1);

namespace Codex\DataConverter\Contract;

interface TableToJsonInterface
{
    /**
     * Converts a table (2D array) to a JSON string
     *
     * @param array $table Table to be converted to JSON
     * @return string JSON representation of the table
     */
    public function tableToJson(array $table): string;

}
