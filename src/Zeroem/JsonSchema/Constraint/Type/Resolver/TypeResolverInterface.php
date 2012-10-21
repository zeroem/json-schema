<?php

namespace Zeroem\JsonSchema\Constraint\Type\Resolver;

interface TypeResolverInterface
{
    /**
     * Given a string or an array of strings,
     * resolve it down to one implementation of
     * ConstraintInterface
     *
     * @param mixed $data
     * @param boolean $subRequest For union types, explode if we get another array
     *
     * @return ConstraintInterface
     */
    public function resolveType($type, $subRequest=false);
}
