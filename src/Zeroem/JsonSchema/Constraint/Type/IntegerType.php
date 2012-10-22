<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * Check that the instance value is an integer
 */
class IntegerType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_int($data);
    }
}
