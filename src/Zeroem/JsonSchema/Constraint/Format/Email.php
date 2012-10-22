<?php

namespace Zeroem\JsonSchema\Constraint\Format;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class EmailFormat implements ConstraintInterface
{
    public function checkConstraint($data) {
        return filter_var($data, FILTER_VALIDATE_EMAIL) !== false;
    }
}
