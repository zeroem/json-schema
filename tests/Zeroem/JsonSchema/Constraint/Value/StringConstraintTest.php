<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\StringConstraint;

class StringConstraintTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider stringTests 
     */
    public function testConstraint($data, $called) {

        $constraint = $this->getMockForAbstractClass(
            'Zeroem\JsonSchema\Constraint\Value\StringConstraint',
            array('checkStringConstraint'),
            '',
            true
        );

        if($called) {
            $constraint->expects($this->once())
                ->method('checkStringConstraint')
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

    public function stringTests() {
        return array(
            array(1,false),
            array(1.0,false),
            array('string', true),
            array(true, false),
            array(new \stdClass, false),
            array(array(), false)
        );
    }
}
