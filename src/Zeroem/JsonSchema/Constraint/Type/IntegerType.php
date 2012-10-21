<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class IntegerType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_int($data);
    }
}
