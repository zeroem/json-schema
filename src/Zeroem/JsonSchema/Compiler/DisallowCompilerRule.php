<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Constraint\InverseConstraint;
use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\AbstractPropertyBasedRule;

class DisallowCompilerRule extends AbstractPropertyBasedRule
{
    public function __construct() {
        parent::__construct('disallow');
    }

    public function compileRule($data, CompilerInterface $compiler) {
        return new InverseConstraint($compiler->getTypeResolver()->resolveType($data->disallow));
    }
}
