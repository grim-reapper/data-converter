<?php
declare(strict_types=1);

namespace Imran\DataConverter\Contract;

interface SerializeInterface
{
    /**
     * Serialize data
     *
     * @param array $data
     * @return string
     */
    public function serialize(array $data) : string;
}
