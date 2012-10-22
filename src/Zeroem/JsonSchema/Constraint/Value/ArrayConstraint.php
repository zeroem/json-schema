<?php

namespace Zeroem\JsonSchema\Constraint\Value;

abstract class ArrayConstraint extends AbstractValueConstraint 
{
    public function checkConstraint($data) {
        if(is_array($data)) {
            return $this->checkArrayConstraint($data);
        }

        return true;
    }

    abstract protected function checkArrayConstraint($data);
}
