<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\ExclusiveMinimum;

class ExclusiveMinimumTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new ExclusiveMinimum(3);
        $this->assertTrue($constraint->checkConstraint(4));
        $this->assertFalse($constraint->checkConstraint(3));
        $this->assertFalse($constraint->checkConstraint(2));
    }
}
