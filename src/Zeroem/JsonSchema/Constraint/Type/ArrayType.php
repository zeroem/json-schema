<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * Check that the instance value is an array
 */
class ArrayType implements TypeConstraintInterface
{
    public function checkConstraint($data) {
        return is_array($data);
    }
}
