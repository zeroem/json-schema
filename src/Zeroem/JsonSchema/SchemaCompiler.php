<?php

namespace Zeroem\JsonSchema;

use Zeroem\JsonSchema\Exception\InvalidSchemaException;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;


class SchemaCompiler
{
    private $typeFactory;
    public function compile(\stdClass $schema) {
        $constraint = new CompositeConstraint;

        if(property_exists($schema, 'type')) {
            $constraint->addConstraint($this->typeFactory->getType($schema->type));

            if(property_exists($schema, 'properties')) {
                foreach($schema->properties as $name=>$childSchema) {
                    if ( isset($childSchema->required) ) {
                        $required = $childSchema->required;
                    } else {
                        $required = false;
                    }

                    $propertyConstraint = new PropertyConstraint($name, $required);
                    $propertyConstraint->addConstraint($this->compile($schema));

                    $this->constraint->addConstraint($propertyConstraint);
                }
            }
        } else {
            throw new InvalidSchemaException('Missing "type" property.'); 
        }
    }
}
