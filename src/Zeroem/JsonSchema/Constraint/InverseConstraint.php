<?php

namespace Zeroem\JsonSchema\Constraint;

class InverseConstraint implements ConstraintInterface
{
    private $constraint;

    public function __construct(ConstraintInterface $constraint) {
        $this->constraint = $constraint;
    }
    public function checkConstraint($data) {
        return ! $this->constraint->checkConstraint($data);
    }
}
