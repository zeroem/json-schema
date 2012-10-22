<?php

namespace Zeroem\JsonSchema\Constraint;

/**
 * Treat an arbitrary collection of constraints as a single, composite constraint
 */
class CompositeConstraint implements ConstraintInterface
{
    /**
     * @var array<ConstraintInterface>
     */
    private $constraints = array();

    /**
     * Logical AND of all child constraints
     *
     * Short circuits on the first failed constraint
     *
     * @param mixed $data data to check
     *
     * @return boolean
     */
    public function checkConstraint($data) {
        foreach($this->constraints as $constraint) {
            if(!$constraint->checkConstraint($data)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Add a child constraint
     *
     * @param ConstraintInterface
     *
     * @return CompositeConstraint
     */
    public function addConstraint(ConstraintInterface $constraint) {
        $this->constraints[] = $constraint;
        return $this;
    }
}
