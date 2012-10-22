<?php

namespace Zeroem\JsonSchema\Constraint\Value;

use Zeroem\JsonSchema\Constraint\CompositeConstraint;

class ValueConstraintBuilder 
{
    static $valueProperties = array(
        'minimum',
        'maximum',
        'exclusiveMinimum',
        'exclusiveMaximum',
        'minItems',
        'maxItems',
        'uniqueItems',
        'pattern',
        'minLength',
        'maxLength',
        'format',
        'divisibleBy'
    );

    private $valueConstraintFactory;

    public function __construct() {
        $this->valueConstraintFactory = new ValueConstraintFactory;
    }

    public function buildValueConstraints($property) {
        $constraint = new CompositeConstraint;
        foreach(self::$valueProperties as $constraintProperty) {
            if(property_exists($property, $constraintProperty)) {
                $valueConstraint = $this->valueConstraintFactory->getValueConstraint(
                    $constraintProperty, $property->$constraintProperty
                );

                if(null !== $valueConstraint) {
                    $constraint->addConstraint(
                        $valueConstraint
                    );
                }
            }
        }

        return $constraint;
    }
}
