<?php

namespace Zeroem\JsonSchema\Compiler;

interface CompilerRuleInterface
{
    /**
     * Determine if the current rule can be applied
     * based on the data providedd
     *
     * @param mixed $data
     *
     * @return boolean
     */
    public function canApply($data);

    /**
     * Compile the given data into a ConstraintInterface
     *
     * @param mixed $data
     * @param CompilerInterface $compiler
     *
     * @return ConstraintInterface
     */
    public function compileRule($data, CompilerInterface $compiler);
}
