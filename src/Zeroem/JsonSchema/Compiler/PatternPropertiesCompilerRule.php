<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Constraint\PatternPropertyConstraint;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;
use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\AbstractPropertyBasedRule;

class PatternPropertiesCompilerRule extends AbstractPropertyBasedRule
{
    public function __construct() {
        parent::__construct('patternProperties');
    }

    public function compileRule($properties, CompilerInterface $compiler) {
        $constraint = new CompositeConstraint;

        foreach($properties as $name=>$childSchema) {
            $propertyConstraint = new PatternPropertyConstraint($name);
            $propertyConstraint->addConstraint($compiler->compile($childSchema));
            $constraint->addConstraint($propertyConstraint);
        }

        return $constraint;
    }
}
