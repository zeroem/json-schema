<?php

namespace Zeroem\JsonSchema\Tests\Constraint\Value;

use Zeroem\JsonSchema\Constraint\Value\Pattern;

class PatternTest extends \PHPUnit_Framework_TestCase
{
    public function testConstraint() {
        $constraint = new Pattern('/^[a-z0-9]*$/');

        $this->assertTrue($constraint->checkConstraint('abc123'));
        $this->assertFalse($constraint->checkConstraint('abc_123'));
    }
}
