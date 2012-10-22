<?php

namespace Zeroem\JsonSchema\Compiler;

interface CompilerInterface
{
    /**
     * Compile a JSON Schema into a graph of constraints
     *
     * @param object $data schema to compile
     *
     * @return ConstraintInterface
     */
    public function compile($data);

    /**
     * Get the Type Resolver instance associated with this compiler
     *
     * @return Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface
     */
    public function getTypeResolver();

    /**
     * Get the Schema Resover instance associated with this compiler
     *
     * @return Zeroem\JsonSchema\Resolver\SchemaResolverInterface
     */
    public function getSchemaResolver();
}
