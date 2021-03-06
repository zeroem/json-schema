<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class DivisibleBy extends NumericConstraint
{
    protected function checkNumericConstraint($data) {
        $result = $data / $this->getValue();

        return $result == (int)$result;
    }
}
