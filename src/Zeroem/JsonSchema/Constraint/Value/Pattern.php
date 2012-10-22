<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class Pattern extends StringConstraint
{
    protected function checkStringConstraint($data) {
        return preg_match($this->getValue(), $data) === 1;
    }
}
