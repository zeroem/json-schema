<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\MinItems;

class MinItemsTest extends \PHPUnit_Framework_TestCase
{
    public function testRequiredPropertyExists() {
        $constraint = new MinItems(3);
        $this->assertTrue($constraint->checkConstraint(array(1,2,3)));
        $this->assertTrue($constraint->checkConstraint(array(1,2,3,4)));
        $this->assertFalse($constraint->checkConstraint(array(1,2)));
    }
}
