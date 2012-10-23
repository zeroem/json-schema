<?php

namespace Zeroem\JsonSchema;

use Zeroem\JsonSchema\Constraint\ConstraintInterface;
use Zeroem\JsonSchema\Constraint\Value\ValueConstraintInterface;
use Zeroem\JsonSchema\Constraint\Type\TypeConstraintInterface;
use Zeroem\JsonSchema\Constraint\CompositeConstraint;
use Zeroem\JsonSchema\Constraint\PropertyConstraint;
use Zeroem\JsonSchema\Constraint\Type\UnionType;

class MessageBuilder
{
    public function buildMessage(array $constraints) {
        $message = "";
        $path = array();

        foreach($constraints as $constraint) {
            if($constraint instanceof PropertyConstraint) {
                $path[] = $constraint->getName();
            } else {
                if( $constraint instanceof UnionType ) {
                    $parts = array();

                    foreach($constraint->getTypes() as $type) {
                        $parts[] = get_class($type);
                    }

                    $message = sprintf('one of [%s]', implode(', ', $parts));
                } else {
                    $message = get_class($constraint);
                }
            }
        }

        $path = implode('/', $path);
        if(!empty($path)) {
            $path = "#/" . $path;
        } else {
            $path = "#";
        }

        return sprintf('Property `%s` failed to pass %s.',$path, $message);
    }
}
