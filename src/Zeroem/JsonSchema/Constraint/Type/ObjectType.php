<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * Check that the instance value is an object
 */
class ObjectType implements TypeConstraintInterface
{
    public function checkConstraint($data) {
        return is_object($data);
    }
}
