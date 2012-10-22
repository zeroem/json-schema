<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\MaxItems;

class MaxItemsTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new MaxItems(3);
        $this->assertTrue($constraint->checkConstraint(array(1,2,3)));
        $this->assertFalse($constraint->checkConstraint(array(1,2,3,4)));
        $this->assertTrue($constraint->checkConstraint(array(1,2)));
    }
}
