<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * check that the instance value is numeric
 *
 * Unlike PHP's native 'is_numeric' function, a 'numeric string'
 * is a valid numeric type.
 */
class NumberType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_int($data) || is_float($data);
    }
}
