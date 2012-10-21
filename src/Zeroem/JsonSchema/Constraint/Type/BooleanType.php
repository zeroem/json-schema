<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class BooleanType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_bool($data);
    }
}
