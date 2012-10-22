<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * Check that the instance value is a string
 */
class StringType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_string($data);
    }
}
