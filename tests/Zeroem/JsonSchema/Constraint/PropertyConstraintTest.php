<?php

namespace Zeroem\JsonSchema\Tests\Constraint;

use Zeroem\JsonSchema\Constraint\PropertyConstraint;

class PropertyContraintTest extends \PHPUnit_Framework_TestCase
{
    public function testRequiredPropertyExists() {
        $constraint = new PropertyConstraint('herp', true);

        $this->assertTrue($constraint->checkConstraint($this->getFixture()));
    }

    public function testRequiredPropertyDoesNotExist() {
        $constraint = new PropertyConstraint('blorp', true);

        $this->assertFalse($constraint->checkConstraint($this->getFixture()));
    }

    public function testOptionalPropertyDoesNotExist() {
        $constraint = new PropertyConstraint('blorp', false);

        $this->assertTrue($constraint->checkConstraint($this->getFixture()));
    }

    public function testCompositeConstraintsForMissingProperty() {
        $child = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface');

        $child->expects($this->never())
            ->method('checkConstraint');

        $constraint = new PropertyConstraint('blurp', true);
        $constraint->addConstraint($child);

        $this->assertFalse($constraint->checkConstraint($this->getFixture()));
    }

    public function testCompositeConstraintsForExistingProperty() {
        // Child returning true should result in true 
        $child = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface');

        $child->expects($this->once())
            ->method('checkConstraint')
            ->with('derp')
            ->will($this->returnValue(true));

        $constraint = new PropertyConstraint('herp', true);
        $constraint->addConstraint($child);

        $this->assertTrue($constraint->checkConstraint($this->getFixture()));

        // Child returning false should result in false
        $child = $this->getMockForAbstractClass('Zeroem\JsonSchema\Constraint\ConstraintInterface');

        $child->expects($this->once())
            ->method('checkConstraint')
            ->with('derp')
            ->will($this->returnValue(false));

        $constraint = new PropertyConstraint('herp', true);
        $constraint->addConstraint($child);

        $this->assertFalse($constraint->checkConstraint($this->getFixture()));
    }

    public function getFixture() {
        $obj = new \stdClass;
        $obj->herp = 'derp';

        return $obj;
    }
}
