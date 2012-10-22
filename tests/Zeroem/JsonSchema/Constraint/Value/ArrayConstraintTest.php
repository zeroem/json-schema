<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\ArrayConstraint;

class ArrayConstraintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider arrayTests 
     */
    public function testConstraint($data, $called) {

        $constraint = $this->getMockForAbstractClass(
            'Zeroem\JsonSchema\Constraint\Value\ArrayConstraint',
            array('checkArrayConstraint'),
            '',
            true
        );

        if($called) {
            $constraint->expects($this->once())
                ->method('checkArrayConstraint')
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

    public function arrayTests() {
        return array(
            array(1,false),
            array(1.0,false),
            array('string', false),
            array(true, false),
            array(new \stdClass, false),
            array(array(), true)
        );
    }
}
