<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class AnyType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return true;
    }
}
