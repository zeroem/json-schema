<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\CompilerRuleInterface;
use Zeroem\JsonSchema\Constraint\Value\ValueConstraintBuilder;

class ValueConstraintsCompilerRule implements CompilerRuleInterface
{
    private $constraintBuilder;

    public function __construct(ValueConstraintBuilder $builder) {
        $this->constraintBuilder = $builder;
    }

    public function canApply($data) {
        return true;
    }

    public function compileRule($data, CompilerInterface $compiler) {
        return $this->constraintBuilder->buildValueConstraints($data);
    }

    public function setConstraintBuilder(ValueConstraintBuilder $builder) {
        $this->constraintBuilder = $builder;
        return $this;
    }

    public function getConstraintBuilder() {
        return $this->constraintBuilder;
    }
}
