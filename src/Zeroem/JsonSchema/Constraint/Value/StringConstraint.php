<?php

namespace Zeroem\JsonSchema\Constraint\Value;

abstract class StringConstraint extends ValueConstraint 
{
    public function checkConstraint($data) {
        if(is_string($data)) {
            return $this->checkStringConstraint($data);
        }

        return true;
    }

    abstract protected function checkStringConstraint($data);
}
