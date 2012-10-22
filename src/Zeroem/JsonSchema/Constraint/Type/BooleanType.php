<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * Check that the instance value is a boolean
 */
class BooleanType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_bool($data);
    }
}
