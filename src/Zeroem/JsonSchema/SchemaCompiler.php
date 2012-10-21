<?php

namespace Zeroem\JsonSchema;

use Zeroem\JsonSchema\Exception\InvalidSchemaException;
use Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface;
use Zeroem\JsonSchema\Resolver\SchemaResolverInterface;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;
use Zeroem\JsonSchema\Constraint\PropertyConstraint;
use Zeroem\JsonSchema\Constraint\PatternPropertyConstraint;

class SchemaCompiler
{
    private $typeResolver;
    private $schemaResolver;

    public function __construct(TypeResolverInterface $typeResolver, SchemaResolverInterface $schemaResolver=null) {
        $this->typeResolver = $typeFactory;
        $this->schemaResolver = $schemaResolver;
    }

    public function compile(\stdClass $schema) {
        $constraint = new CompositeConstraint;

        if(property_exists($schema, 'type')) {

            // what do we do if a custom type doesn't exist?
            $constraint->addConstraint($this->getTypeConstraint($schema->type));

            if(property_exists($schema, 'properties')) {
                foreach($schema->properties as $name=>$childSchema) {
                    if ( isset($childSchema->required) ) {
                        $required = $childSchema->required;
                    } else {
                        $required = false;
                    }

                    $propertyConstraint = new PropertyConstraint($name, $required);
                    $propertyConstraint->addConstraint($this->getSchema($childSchema));
                    $this->constraint->addConstraint($propertyConstraint);
                }
            }

            if(property_exists($schema, 'patternProperties')) {
                foreach($schema->patternProperties as $pattern=>$childSchema) {
                    $patternConstraint = new PatternPropertyConstraint($pattern);
                    $patternConstraint->addConstraint($this->getSchema($childSchema));

                    $this->constraint->addConstraint($patternConstraint);
                }
            }
        } else {
            throw new InvalidSchemaException('Missing "type" property.'); 
        }
    }

    private function getSchema($schema) {
        return $this->compile(
            $this->schemaResolver->resolveSchema($schema)
        );
    }
}
