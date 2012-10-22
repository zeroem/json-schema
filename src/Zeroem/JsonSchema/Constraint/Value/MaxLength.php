<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class MaxLength extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_string($data));

        return strlen($data) <= $this->getValue();
    }
}
