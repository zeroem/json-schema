<?php

namespace Zeroem\JsonSchema\Constraint;

class CompositeConstraint implements ConstraintInterface
{
    private $constraints = array();

    public function checkConstraint($data) {
        foreach($this->constraints as $constraint) {
            if(!$constraint->checkConstraint($data)) {
                return false;
            }
        }

        return true;
    }

    public function addConstraint(ConstraintInterface $constraint) {
        $this->constraints[] = $constraint;
    }
}
