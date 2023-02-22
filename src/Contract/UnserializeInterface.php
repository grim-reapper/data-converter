<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;


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
