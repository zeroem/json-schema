<?php

namespace Zeroem\JsonSchema\Constraint\Type;

class TypeFactoryInterface
{
    /**
     * Retrieve the type object associated with the give key
     *
     * @param string $key type key
     *
     * @return ConstraintInterface|null returns null if the key does not map to any type
     */ 
    public function getType($key);
}
