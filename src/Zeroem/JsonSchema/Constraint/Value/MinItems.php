<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class MinItems extends ArrayConstraint
{
    protected function checkArrayConstraint($data) {
        assert(is_array($data));

        return count($data) >= $this->getValue();
    }
}
