<?php

namespace Zeroem\JsonSchema\Tests\Compiler\Compiler;

use Zeroem\JsonSchema\Compiler\Compiler;

class CompilerTest extends \PHPUnit_Framework_TestCase
{
    public function testCompile() {
        $schemaResolver = $this->getMockForAbstractClass('Zeroem\JsonSchema\Resolver\SchemaResolverInterface');
        $typeResolver = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolverInterface');

        $schema = new \stdClass;

        $schemaResolver->expects($this->once())
            ->method('resolveSchema')
            ->with($schema)
            ->will($this->returnValue($schema));

        $compiler = new Compiler($schemaResolver, $typeResolver);

        $rule = $this->getMockForAbstractClass('Zeroem\JsonSchema\Compiler\CompilerRuleInterface');

        $rule->expects($this->once())
            ->method('canApply')
            ->with($schema)
            ->will($this->returnValue(true));

        $rule->expects($this->once())
            ->method('compileRule')
            ->with($schema, $compiler)
            ->will($this->returnValue($this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface')));

        $compiler->addRule($rule);

        $compiler->compile($schema);
    }
}
