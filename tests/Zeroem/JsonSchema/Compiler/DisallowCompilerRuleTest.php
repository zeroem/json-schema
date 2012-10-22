<?php

namespace Zeroem\JsonSchema\Tests\Compiler;

use Zeroem\JsonSchema\Compiler\DisallowCompilerRule;

class DisallowCompilerRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testCompileRule() {
        $compiler = $this->getMockForAbstractClass('Zeroem\JsonSchema\Compiler\CompilerInterface');
        $typeResolver = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface');
        $constraint = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface');

        $fixture = new \stdClass;
        $fixture->disallow="blah";

        $dummyData = 'derp';

        $compiler->expects($this->once())
            ->method('getTypeResolver')
            ->will($this->returnValue($typeResolver));

        $typeResolver->expects($this->once())
            ->method('resolveType')
            ->with($fixture->disallow)
            ->will($this->returnValue($constraint));

        $constraint->expects($this->once())
            ->method('checkConstraint')
            ->with($dummyData)
            ->will($this->returnValue(true));

        $rule = new DisallowCompilerRule;

        $result = $rule->compileRule($fixture, $compiler);

        $this->assertInstanceOf('Zeroem\JsonSchema\Constraint\InverseConstraint', $result);
        $this->assertFalse($result->checkConstraint($dummyData));
    }
}
