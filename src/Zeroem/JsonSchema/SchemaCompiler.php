<?php

namespace Zeroem\JsonSchema;

use Zeroem\JsonSchema\Exception\InvalidSchemaException;
use Zeroem\JsonSchema\Constraint\Type\TypeFactoryInterface;
use Zeroem\JsonSchema\Resolver\SchemaResolverInterface;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;
use Zeroem\JsonSchema\Constraint\PropertyConstraint;
use Zeroem\JsonSchema\Constraint\PatternPropertyConstraint;


class SchemaCompiler
{
    private $typeFactory;
    private $schemaResolver;

    public function __construct(TypeFactoryInterface $typeFactory, SchemaResolverInterface $schemaResolve=null) {
        $this->typeFactory = $typeFactory;
        $this->schemaResolver = $schemaResolver;
    }

    public function compile(\stdClass $schema) {
        $constraint = new CompositeConstraint;

        if(property_exists($schema, 'type')) {

            // what do we do if the requested type doesn't exist?
            $constraint->addConstraint($this->typeFactory->getType($schema->type));

            if(property_exists($schema, 'properties')) {
                foreach($schema->properties as $name=>$childSchema) {
                    if ( isset($childSchema->required) ) {
                        $required = $childSchema->required;
                    } else {
                        $required = false;
                    }

                    $propertyConstraint = new PropertyConstraint($name, $required);

                    $this->addSchemaConstraint($propertyConstraint, $schema);

                    $this->constraint->addConstraint($propertyConstraint);
                }
            }

            if(property_exists($schema, 'patternProperties')) {
                foreach($schema->patternProperties as $pattern=>$childSchema) {
                    $patternConstraint = new PatternPropertyConstraint($pattern);
                    $this->addSchemaConstraint($patternConstraint, $schema);

                    $this->constraint->addConstraint($patternConstraint);
                }
            }
        } else {
            throw new InvalidSchemaException('Missing "type" property.'); 
        }
    }

    private function addSchemaConstraint(CompositeConstraint $constraint, $schema) {
        $schema = $this->getSchema($schema);

        if(null !== $schema) {
            $constraint->addConstraint($schema);
        }

        return $constraint;
    }

    private function getSchema($schema) {
        if(is_object($schema)) {
            return $schema;
        } else {
            if(isset($this->schemaResolver)) {
                return $this->schemaResolver->resolve($schema);
            }
        }

        return null;
    }
}
