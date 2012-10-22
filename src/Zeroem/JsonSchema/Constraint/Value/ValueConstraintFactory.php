<?php

namespace Zeroem\JsonSchema\Constraint\Value;

class ValueConstraintFactory
{
    public function getValueConstraint($name, $value) {
        $class = 'Zeroem\JsonSchema\Constraint\Value\\' . ucfirst($name);

        if(class_exists($class)) {
            return new $class($value);
        }

        return null;
    }
}
