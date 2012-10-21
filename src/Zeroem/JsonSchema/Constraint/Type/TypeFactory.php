<?php

namespace Zeroem\JsonSchema\Constraint\Type;

class TypeFactory
{
    private $types = array();

    public function addType($key, $class) {
        $this->types[$key] = $class;
    }

    public function factory($key) {
        return $this->types[$key];
    }
}
