<?php

namespace Zeroem\JsonSchema\Tests\Compiler;

use Zeroem\JsonSchema\Compiler\PropertiesCompilerRule;

class PropertyCompilerRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testCompileRule() {
        $compiler = $this->getMockForAbstractClass('Zeroem\JsonSchema\Compiler\CompilerInterface');
        $constraint = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface');
        $schemaResolver = $this->getMockForAbstractClass('Zeroem\JsonSchema\Resolver\SchemaResolverInterface');

        $fixture = new \stdClass;
        $fixture->properties = new \stdClass;
        $fixture->properties->a_property = new \stdClass;
        $fixture->type = "a type";

        $compiler->expects($this->once())
            ->method('compile')
            ->with($fixture->properties->a_property)
            ->will($this->returnValue($constraint));

        $compiler->expects($this->once())
            ->method('getSchemaResolver')
            ->will($this->returnValue($schemaResolver));

        $schemaResolver->expects($this->once())
            ->method('resolveSchema')
            ->with($fixture->properties->a_property)
            ->will($this->returnValue($fixture->properties->a_property));

        $rule = new PropertiesCompilerRule;

        $rule->compileRule($fixture, $compiler);
    }
}

