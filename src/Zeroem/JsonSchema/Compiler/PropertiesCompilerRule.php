<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Constraint\CompositeConstraint;
use Zeroem\JsonSchema\Constraint\PropertyConstraint;
use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\AbstractPropertyBasedRule;

class PropertiesCompilerRule extends AbstractPropertyBasedRule
{
    public function __construct() {
        parent::__construct('properties');
    }

    public function compileRule($data, CompilerInterface $compiler) {
        $constraint = new CompositeConstraint;

        foreach($data->properties as $name=>$childSchema) {
            $childSchema = $compiler->getSchemaResolver()->resolveSchema($childSchema);

            if ( isset($childSchema->required) ) {
                $required = $childSchema->required;
            } else {
                $required = false;
            }

            $propertyConstraint = new PropertyConstraint($name, $required);

            $propertyConstraint->addConstraint($compiler->compile($childSchema));
            $constraint->addConstraint($propertyConstraint);
        }

        return $constraint;
    }
}
