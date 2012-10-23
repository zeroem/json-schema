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
    private $failedConstraint;

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
        $this->failedConstraint = null;
        foreach($this->constraints as $constraint) {
            if(!$constraint->checkConstraint($data)) {
                $this->setFailedConstraint($constraint);
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

    protected function setFailedConstraint(ConstraintInterface $constraint) {
        $this->failedConstraint = $constraint;
    }

    public function collectFailedConstraint() {
        $result = array($this);

        if(isset($this->failedConstraint)) {
            if($this->failedConstraint instanceof CompositeConstraint) {
                $result = array_merge($result, $this->failedConstraint->collectFailedConstraint());
            } else {
                $result[] = $this->failedConstraint;
            }
        }

        return $result;
    }
}
