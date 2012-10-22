<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class MinLength extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_string($data));

        return strlen($data) >= $this->getValue();
    }
}
