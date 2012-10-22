<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

abstract class AbstractValueConstraint implements ConstraintInterface
{
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }
}
