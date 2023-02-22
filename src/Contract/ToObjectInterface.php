<?php

namespace Codex\DataConverter\Contract;


interface ToObjectInterface
{
    /**
     * Converts data in any format (CSV, JSON, XML) to an object
     *
     * @param mixed $data Data in any format (CSV, JSON, XML)
     * @return object Object representation of the data
     */
    public function toObject(mixed $data) : object;
}
