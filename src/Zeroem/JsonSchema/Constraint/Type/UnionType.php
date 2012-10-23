<?php

namespace Zeroem\JsonSchema\Constraint\Type;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class UnionType implements TypeConstraintInterface
{
    private $types = array();
    private $match = false;

    public function checkConstraint($data) {
        $this->match = false;
        foreach($this->types as $constraint) {
            if($constraint->checkConstraint($data)) {
                $this->match = $constraint;
                return true;
            }
        }

        return false;
    }

    public function getMatchedConstraint() {
        return $this->match;
    }

    public function addType(ConstraintInterface $type) {
        assert(!($type instanceof self));

        $this->types[] = $type;
    }
}
