<?php

namespace Zeroem\JsonSchema\Tests\Compiler;

use Zeroem\JsonSchema\Compiler\TypeCompilerRule;

class TypeCompilerRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testCompileRule() {
        $compiler = $this->getMockForAbstractClass('Zeroem\JsonSchema\Compiler\CompilerInterface');
        $typeResolver = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface');

        $fixture = new \stdClass;
        $fixture->type="blah";

        $compiler->expects($this->once())
            ->method('getTypeResolver')
            ->will($this->returnValue($typeResolver));

        $typeResolver->expects($this->once())
            ->method('resolveType')
            ->with($fixture->type);

        $rule = new TypeCompilerRule;


        $rule->compileRule($fixture, $compiler);
    }
}
