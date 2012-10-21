<?php 

namespace Zeroem\JsonSchema\Constraint;

class PatternPropertyConstraint extends CompositeConstraint
{
    private $pattern;
    private $required;

    private $failedProperty;

    public function __construct($pattern) {
        $this->pattern= $pattern;
        $this->required = $required;
    }

    public function checkConstraint($data) {
        assert(is_object($data));

        $this->failedProperty = null;

        foreach($data as $name=>$value) {
            if(1 === preg_match($this->pattern, $name)) {
                if(!parent::checkConstraint($value)) {
                    $this->failedProperty = array($name, $value);
                    return false;
                }
            }
        }
    }
}

