<?php

namespace Zeroem\JsonSchema\Constraint;

/**
 * Inverts the result of a constraint check
 *
 * Primarily targeted at the "disallow" property
 */
class InverseConstraint implements ConstraintInterface
{
    /**
     * @var ConstraintInterface the constraint to invert
     */
    private $constraint;

    /**
     * @param ConstraintInterface the constraint whose result will be inversed
     */
    public function __construct(ConstraintInterface $constraint) {
        $this->constraint = $constraint;
    }

    /**
     * Invert the result of the given constraint
     *
     * @param mixed $data
     *
     * @return boolean
     */
    public function checkConstraint($data) {
        return ! $this->constraint->checkConstraint($data);
    }
}
