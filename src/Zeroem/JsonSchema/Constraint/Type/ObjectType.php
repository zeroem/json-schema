<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class ObjectType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_object($data);
    }
}
