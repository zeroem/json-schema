<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class DivisibleBy extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_int($data) || is_float($data));

        $result = $data / $this->getValue();

        return $result === (int)$result;
    }
}
