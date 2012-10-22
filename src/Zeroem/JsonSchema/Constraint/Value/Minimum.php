<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class Minimum extends NumericConstraint
{
    protected function checkNumericConstraint($data) {
        return $data >= $this->getValue();
    }
}
