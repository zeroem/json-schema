<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Type;

use Zeroem\JsonSchema\Constraint\Type\StringType;
use Zeroem\JsonSchema\Constraint\Type\NumberType;
use Zeroem\JsonSchema\Constraint\Type\IntegerType;
use Zeroem\JsonSchema\Constraint\Type\BooleanType;
use Zeroem\JsonSchema\Constraint\Type\ObjectType;
use Zeroem\JsonSchema\Constraint\Type\ArrayType;
use Zeroem\JsonSchema\Constraint\Type\NullType;
use Zeroem\JsonSchema\Constraint\Type\UnionType;

class TypeConstraintTest extends \PHPUnit_Framework_TestCase
{
    public function testStringType() {
        $type = new StringType();

        $this->assertTrue($type->checkConstraint('herp'));
        $this->assertFalse($type->checkConstraint(123));
        $this->assertFalse($type->checkConstraint(123.01));
        $this->assertFalse($type->checkConstraint(true));
        $this->assertFalse($type->checkConstraint(null));
        $this->assertFalse($type->checkConstraint(array()));
        $this->assertFalse($type->checkConstraint(new \stdClass));
    }

    public function testNumberType() {
        $type = new NumberType();

        $this->assertFalse($type->checkConstraint('herp'));
        $this->assertTrue($type->checkConstraint(123));
        $this->assertTrue($type->checkConstraint(123.01));
        $this->assertFalse($type->checkConstraint(true));
        $this->assertFalse($type->checkConstraint(null));
        $this->assertFalse($type->checkConstraint(array()));
        $this->assertFalse($type->checkConstraint(new \stdClass));
    }

    public function testIntegerType() {
        $type = new IntegerType();

        $this->assertFalse($type->checkConstraint('herp'));
        $this->assertTrue($type->checkConstraint(123));
        $this->assertFalse($type->checkConstraint(123.01));
        $this->assertFalse($type->checkConstraint(true));
        $this->assertFalse($type->checkConstraint(null));
        $this->assertFalse($type->checkConstraint(array()));
        $this->assertFalse($type->checkConstraint(new \stdClass));
    }

    public function testBooleanType() {
        $type = new BooleanType();

        $this->assertFalse($type->checkConstraint('herp'));
        $this->assertFalse($type->checkConstraint(123));
        $this->assertFalse($type->checkConstraint(123.01));
        $this->assertTrue($type->checkConstraint(true));
        $this->assertFalse($type->checkConstraint(null));
        $this->assertFalse($type->checkConstraint(array()));
        $this->assertFalse($type->checkConstraint(new \stdClass));
    }

    public function testObjectType() {
        $type = new ObjectType();

        $this->assertFalse($type->checkConstraint('herp'));
        $this->assertFalse($type->checkConstraint(123));
        $this->assertFalse($type->checkConstraint(123.01));
        $this->assertFalse($type->checkConstraint(true));
        $this->assertFalse($type->checkConstraint(null));
        $this->assertFalse($type->checkConstraint(array()));
        $this->assertTrue($type->checkConstraint(new \stdClass));
    }

    public function testArrayType() {
        $type = new ArrayType();

        $this->assertFalse($type->checkConstraint('herp'));
        $this->assertFalse($type->checkConstraint(123));
        $this->assertFalse($type->checkConstraint(123.01));
        $this->assertFalse($type->checkConstraint(true));
        $this->assertFalse($type->checkConstraint(null));
        $this->assertTrue($type->checkConstraint(array()));
        $this->assertFalse($type->checkConstraint(new \stdClass));
    }

    public function testNullType() {
        $type = new NullType();

        $this->assertFalse($type->checkConstraint('herp'));
        $this->assertFalse($type->checkConstraint(123));
        $this->assertFalse($type->checkConstraint(123.01));
        $this->assertFalse($type->checkConstraint(true));
        $this->assertTrue($type->checkConstraint(null));
        $this->assertFalse($type->checkConstraint(array()));
        $this->assertFalse($type->checkConstraint(new \stdClass));
    }

    public function testUnionType() {
        $type = new UnionType();
        $type->addType(new StringType);
        $type->addType(new BooleanType);

        $this->assertTrue($type->checkConstraint(true));
        $this->assertTrue($type->checkConstraint('blorp'));
        $this->assertFalse($type->checkConstraint(123));
    }
}
