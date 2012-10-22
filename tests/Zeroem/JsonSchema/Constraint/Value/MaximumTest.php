<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\Maximum;

class MaximumTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new Maximum(3);
        $this->assertFalse($constraint->checkConstraint(4));
        $this->assertTrue($constraint->checkConstraint(3));
        $this->assertTrue($constraint->checkConstraint(2));
    }
}
