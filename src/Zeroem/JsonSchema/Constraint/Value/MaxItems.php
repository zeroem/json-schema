<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class MaxItems extends ValueConstraint
{
    public function checkConstraint($data) {
        assert(is_array($data));

        return count($data) <= $this->getValue();
    }
}
