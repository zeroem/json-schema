<?php

namespace Zeroem\JsonSchema\Constraint\Type\Resolver;

use Zeroem\JsonSchema\Constraint\Type\TypeFactoryInterface;
use Zeroem\JsonSchema\Exception\InvalidSchemaException;
use Zeroem\JsonSchema\Constraint\Type\AnyType;
use Zeroem\JsonSchema\Constraint\Type\UnionType;

class TypeResolver implements TypeResolverInterface
{
    private $typeFactory;
    private $throw;

    public function __construct(TypeFactoryInterface $typeFactory, $throw=false) {
        $this->typeFactory = $typeFactory;
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
            $result = $this->typeFactory->getType($type);

            if(is_null($result)) {
              if(!$throw) {
                  $result = new AnyType;
                } else {
                    throw new InvalidSchemaException(sprintf('Unsupported type, `%s`', $type));
                }
            }

            return $result;
        }
    }
}
