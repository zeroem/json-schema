<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * check that the instance value matches any type
 */
class AnyType implements TypeConstraintInterface
{
    public function checkConstraint($data) {
        return true;
    }
}
