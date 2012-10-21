<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class NumberType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_int($data) || is_float($data);
    }
}
