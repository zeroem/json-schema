<?php

namespace Zeroem\JsonSchema\Constraint\Type;

/**
 * Stores a map of string keys to class names
 */
class TypeFactory implements TypeFactoryInterface
{
    private $types;

    public function __construct(array $types = array()) {
        $this->types = $types;
    }

    /**
     * Add an new key/class entry
     *
     * @param string $key lookup key
     * @param string $class FQCN
     *
     * @return TypeFactory
     */
    public function addType($key, $class) {
        $this->types[$key] = $class;
        return $this;
    }

    public function getType($key) {
        return new $this->types[$key];
    }
}
