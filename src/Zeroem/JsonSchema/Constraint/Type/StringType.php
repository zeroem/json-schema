<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class StringType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_string($data);
    }
}
