<?php

namespace Zeroem\JsonSchema\Constraint\Type;

class TypeFactoryInterface
{
    /**
     * Retrieve the type object associated with the give key
     *
     * @param string $key type key
     *
     * @return ConstraintInterface 
     */ 
    public function getType($key);
}
