<?php

namespace Zeroem\JsonSchema\Constraint\Value;

abstract class NumericConstraint extends AbstractValueConstraint 
{
    public function checkConstraint($data) {
        if(is_int($data) || is_float($data)) {
            return $this->checkNumericConstraint($data);
        }

        return true;
    }

    abstract protected function checkNumericConstraint($data);
}
