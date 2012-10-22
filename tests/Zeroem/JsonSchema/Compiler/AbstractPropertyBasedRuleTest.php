<?php

namespace Zeroem\JsonSchema\Tests\Compiler;

use Zeroem\JsonSchema\Compiler\AbstractPropertyBasedRule;

class AbstractPropertyBasedRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testCanApply() {
        $mock = $this->getMockForAbstractClass('Zeroem\JsonSchema\Compiler\AbstractPropertyBasedRule', array('property'));

        $fixture = new \stdClass;
        $fixture->property=null;

        $this->assertTrue($mock->canApply($fixture));

        $fixture = new \stdClass;
        $fixture->not_property=null;

        $this->assertFalse($mock->canApply($fixture));
    }
}
