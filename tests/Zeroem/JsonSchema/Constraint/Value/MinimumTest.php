<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\Minimum;

class MinimumTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new Minimum(3);
        $this->assertTrue($constraint->checkConstraint(4));
        $this->assertTrue($constraint->checkConstraint(3));
        $this->assertFalse($constraint->checkConstraint(2));
    }
}
