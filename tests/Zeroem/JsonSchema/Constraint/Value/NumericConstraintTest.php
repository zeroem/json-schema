<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\NumericConstraint;

class NumericConstraintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider numericTests
     */
    public function testConstraint($data, $called) {

        $constraint = $this->getMockForAbstractClass(
            'Zeroem\JsonSchema\Constraint\Value\NumericConstraint',
            array('checkNumericConstraint'),
            '',
            true
        );

        if($called) {
            $constraint->expects($this->once())
                ->method('checkNumericConstraint')
                ->with($data)
                ->will($this->returnValue(false));
        }

        $result = $constraint->checkConstraint($data);

        if(!$called) {
            $this->assertTrue($result);
        } else {
            $this->assertFalse($result);
        }
    }

    public function numericTests() {
        return array(
            array(1,true),
            array(1.0,true),
            array('string', false),
            array(true, false),
            array(new \stdClass, false),
            array(array(), false)
        );
    }
}
