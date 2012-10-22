<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\CompilerRuleInterface;

class ValueConstraintsCompilerRule implements CompilerRuleInterface
{
    public function canApply() {
        return true;
    }

    public function compileRule($data, CompilerInterface $compiler) {
        return $compiler->getValueConstraintBuilder()->buildValueConstraints($data);
    }
}
