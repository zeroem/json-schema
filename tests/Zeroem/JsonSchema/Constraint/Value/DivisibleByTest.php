<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\DivisibleBy;

class DivisibleByTest extends \PHPUnit_Framework_TestCase
{
    public function testRequiredPropertyExists() {
        $constraint = new DivisibleBy(3);
        $this->assertTrue($constraint->checkConstraint(3));
        $this->assertTrue($constraint->checkConstraint(6));
        $this->assertFalse($constraint->checkConstraint(4));
    }
}
