<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class MinItems extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_array($data));

        return count($data) >= $this->getValue();
    }
}
