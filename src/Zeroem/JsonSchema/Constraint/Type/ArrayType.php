<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class ArrayType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_array($data);
    }
}
