<?php

namespace Zeroem\JsonSchema;

use Zeroem\JsonSchema\Exception\InvalidSchemaException;
use Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface;
use Zeroem\JsonSchema\Constraint\Type\Value\ValueConstraintBuilder;
use Zeroem\JsonSchema\Resolver\SchemaResolverInterface;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;
use Zeroem\JsonSchema\Constraint\PropertyConstraint;
use Zeroem\JsonSchema\Constraint\PatternPropertyConstraint;

class SchemaCompiler
{
    private $typeResolver;
    private $schemaResolver;
    private $valueConstraintBuilder;

    public function __construct(
        TypeResolverInterface $typeResolver,
        ValueConstraintBuilder $valueConstraintBuilder,
        SchemaResolverInterface $schemaResolver=null,
    ) {
        $this->typeResolver = $typeFactory;
        $this->valueConstraintBuilder = $valueConstraintBuilder;
        $this->schemaResolver = $schemaResolver;
    }

    public function compile($schema) {
        $schema = $this->getSchema($schema);

        $constraint = new CompositeConstraint;

        if(property_exists($schema, 'type')) {

            // what do we do if a custom type doesn't exist?
            $constraint->addConstraint($this->typeResolver->resolveType($schema->type));
        }

        if(property_exists($schema, 'disallow')) {
            $constraint->addConstraint(new InverseConstraint($this->typeResolver->resolveType($schema->type)));
        }

        if(property_exists($schema, 'properties')) {
            foreach($schema->properties as $name=>$childSchema) {
                $childSchema = $this->getSchema($childSchema);

                if ( isset($childSchema->required) ) {
                    $required = $childSchema->required;
                } else {
                    $required = false;
                }

                $propertyConstraint = new PropertyConstraint($name, $required);
                $propertyConstraint->addConstraint($this->compile($childSchema));
                $constraint->addConstraint($propertyConstraint);
            }
        }

        if(property_exists($schema, 'patternProperties')) {
            foreach($schema->patternProperties as $pattern=>$childSchema) {
                $patternConstraint = new PatternPropertyConstraint($pattern);
                $patternConstraint->addConstraint($this->compile($childSchema));

                $this->constraint->addConstraint($patternConstraint);
            }
        }


        $constraint->addConstraint($this->valueConstraintBuilder->buildValueConstraints($schema));

        return $constraint;
    }

    private function getSchema($schema) {
        return $this->compile(
            $this->schemaResolver->resolveSchema($schema)
        );
    }
}
