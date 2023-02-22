<?php
declare(strict_types=1);

namespace Codex\DataConverter\Contract;


interface UnserializeInterface
{
    /**
     * Unserialize data
     *
     * @param string $serialized
     * @return array
     */
    public function unserialize(string $serialized): array;
}
