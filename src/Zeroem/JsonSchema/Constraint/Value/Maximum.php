<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class Maximum extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_int($data) || is_float($data));

        return $data <= $this->getValue();
    }
}
