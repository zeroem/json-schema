<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

/**
 * check that the instance value is null
 */
class NullType implements ConstraintInterface
{
    public function checkConstraint($data) {
        return is_null($data);
    }
}
