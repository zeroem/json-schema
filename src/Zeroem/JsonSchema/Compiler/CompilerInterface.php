<?php

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
}
