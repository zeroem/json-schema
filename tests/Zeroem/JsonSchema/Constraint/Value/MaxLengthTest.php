<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\MaxLength;

class MaxLengthTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new MaxLength(3);
        $this->assertTrue($constraint->checkConstraint('abc'));
        $this->assertFalse($constraint->checkConstraint('abcd'));
        $this->assertTrue($constraint->checkConstraint('ab'));
    }
}
