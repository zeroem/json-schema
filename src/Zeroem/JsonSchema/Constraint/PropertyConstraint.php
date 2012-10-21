<?php

namespace Zeroem\JsonSchema\Constraint;

class PropertyConstraint extends CompositeConstraint
{
    private $name;
    private $required;

    public function __construct($name, $required) {
        $this->name = $name;
        $this->required = $required;
    }

    public function checkConstraint($data) {
        if(property_exists($data, $this->name)) {
            return parent::checkConstraint($data->{$this->name});
        } else {
            return !$this->required;
        }
    }
}

