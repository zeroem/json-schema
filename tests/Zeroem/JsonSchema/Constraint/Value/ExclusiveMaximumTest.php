<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\ExclusiveMaximum;

class ExclusiveMaximumTest extends \PHPUnit_Framework_TestCase
{
    public function testRequiredPropertyExists() {
        $constraint = new ExclusiveMaximum(3);
        $this->assertFalse($constraint->checkConstraint(4));
        $this->assertFalse($constraint->checkConstraint(3));
        $this->assertTrue($constraint->checkConstraint(2));
    }
}
