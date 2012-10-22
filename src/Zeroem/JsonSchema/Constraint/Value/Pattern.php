<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class Pattern extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_string($data));

        return preg_match($this->getValue(), $data) === 1;
    }
}
