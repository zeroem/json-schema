<?php

namespace Zeroem\JsonSchema\Constraint\Format;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;

class IpAddress implements ConstraintInterface
{
    public function checkConstraint($data) {
        return filter_var($data, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
}
