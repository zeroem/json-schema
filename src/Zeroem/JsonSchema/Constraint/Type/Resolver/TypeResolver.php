<?php

namespace Zeroem\JsonSchema\Constraint\Type\Resolver;

use Zeroem\JsonSchema\Constraint\Type\TypeFactoryInterface;
use Zeroem\JsonSchema\Exception\InvalidSchemaException;
use Zeroem\JsonSchema\Constraint\Type\AnyType;

class TypeResolver implements TypeResolverInterface
{
    private $typeFactory;
    private $throw;

    public function __construct(TypeFactoryInterface $typeFactory, $throw=false) {
        $this->typeFactoryInterface = $typeFactory;
        $this->throw = $throw;
    }

    public function resolveType($type, $subRequest = false) {
        if(is_array($type)) {

            if($subRequest) {
                throw new InvalidSchemaException('Union types can only contain Simple types');
            }

            $union = new UnionType;
            foreach($type as $subType) {
                $union->addType($this->resolveType($subType, true));
            }

            return $union;
        } else {
            $result = $this->typeFactory->getType($schema->type);

            if(is_null($result) && !$throw) {
                $result = new AnyType;
            }

            return $result;
        }
    }
}
