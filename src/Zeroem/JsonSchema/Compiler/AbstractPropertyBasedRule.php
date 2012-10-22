<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Compiler\CompilerInterface;

abstract class AbstractPropertyBasedRule implements CompilerRuleInterface
{
    private $propertyName;

    public function __construct($name) {
        $this->propertyName = $name;
    }

    /**
     * Default behavior.  If the given property exists, we can
     * compile it
     *
     * @param mixed $data
     *
     * @return boolean
     */
    public function canApply($data) {
        // NOTE: May be able to eliminate this check.  The only thing that
        // _SHOULD_ be passed to this method is a resolved schema
        if(is_object($data)) {
            return property_exists($data, $this->propertyName);
        }

        return false;
    }
}
