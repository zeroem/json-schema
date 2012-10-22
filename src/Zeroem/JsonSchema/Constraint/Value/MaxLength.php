<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class MaxLength extends StringConstraint
{
    protected function checkStringConstraint($data) {
        return strlen($data) <= $this->getValue();
    }
}
