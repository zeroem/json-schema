<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\MinLength;

class MinLengthTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new MinLength(3);
        $this->assertTrue($constraint->checkConstraint('abc'));
        $this->assertTrue($constraint->checkConstraint('abcd'));
        $this->assertFalse($constraint->checkConstraint('ab'));
    }
}
