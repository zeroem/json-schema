<?php 

namespace Zeroem\JsonSchema\Constraint;

/**
 * Apply a set of constraints to properties matching the given regex
 */
class PatternPropertyConstraint extends CompositeConstraint
{
    /**
     * @var string regex
     */
    private $pattern;
    private $failedProperty;

    /**
     * @param string $pattern regular expression
     */
    public function __construct($pattern) {
        $this->pattern = $pattern;
    }

    /**
     * Check all properties with names matching the given regex
     * against the schema described by the 'patternProperties' attribute
     *
     * @param mixed $data
     *
     * @return boolean
     */
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

        return true;
    }
}

