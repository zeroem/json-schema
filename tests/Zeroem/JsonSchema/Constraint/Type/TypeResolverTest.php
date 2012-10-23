<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Type\Resolver;

use Zeroem\JsonSchema\Constraint\Type\Resolver\TypeResolver;

class TypeResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testSimpleType() {
        $type = 'derp';
        $typeFactory = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\Type\TypeFactoryInterface');

        $typeFactory->expects($this->once())
            ->method('getType')
            ->with($type)
            ->will($this->returnValue($this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface')));

        $typeResolver = new TypeResolver($typeFactory);
        $typeResolver->resolveType($type);
    }

    public function testUnionType() {
        $type = array('herp');
        $typeFactory = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\Type\TypeFactoryInterface');

        $typeFactory->expects($this->once())
            ->method('getType')
            ->with($type[0])
            ->will($this->returnValue($this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface')));

        $typeResolver = new TypeResolver($typeFactory);
        $typeResolver->resolveType($type);
    }
}
