<?php

namespace Zeroem\JsonSchema\Compiler;

use Zeroem\JsonSchema\Compiler\CompilerInterface;
use Zeroem\JsonSchema\Compiler\AbstractPropertyBasedRule;

class TypeCompilerRule extends AbstractPropertyBasedRule
{
    public function __construct() {
        parent::__construct('type');
    }

    public function compileRule($data, CompilerInterface $compiler) {
        return $compiler->getTypeResolver()->resolveType($data->type);
    }
}
