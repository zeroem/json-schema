<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\CompilerRuleInterface;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;

use Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface;
use Zeroem\JsonSchema\Constraint\Value\ValueConstraintBuilder;
use Zeroem\JsonSchema\Resolver\SchemaResolverInterface;

class Compiler implements CompilerInterface
{
    private $rules=array();
    private $typeResolver;
    private $schemaResolver;

    public function __construct(SchemaResolverInterface $schemaResolver, TypeResolverInterface $typeResolver) {
        $this->typeResolver = $typeResolver;
        $this->schemaResolver = $schemaResolver;
    }
    
    public function compile($schema) {
        $schema = $this->schemaResolver->resolveSchema($schema);
        $constraints = new CompositeConstraint;

        foreach($this->rules as $rule) {
            if($rule->canApply($schema)) {
                $constraints->addConstraint($rule->compileRule($schema, $this));
            }
        }

        return $constraints;
    }

    public function addRule(CompilerRuleInterface $rule) {
        $this->rules[] = $rule;
        return $this;
    }

    public function getTypeResolver() {
        return $this->typeResolver;
    }

    public function setTypeResolver(TypeResolverInterface $resolver) {
        $this->typeResolver = $resolver;
        return $this;
    }

    public function getSchemaResolver() {
        return $this->schemaResolver;
    }

    public function setSchemaResolver(SchemaResolverInterface $resolver) {
        $this->schemaResolver = $resolver;
        return $this;
    }

    public static function buildCompiler(
        SchemaResolverInterface $schemaResolver,
        TypeResolverInterface $typeResolver,
        ValueConstraintBuilder $builder
    ) {
        $compiler = new Compiler($schemaResolver, $typeResolver);

        $compiler
            ->addRule(new TypeCompilerRule)
            ->addRule(new DisallowCompilerRule)
            ->addRule(new PatternPropertiesCompilerRule)
            ->addRule(new PropertiesCompilerRule)
            ->addRule(new ValueConstraintsCompilerRule($builder));

        return $compiler;
    }
}
