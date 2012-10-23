<?php

namespace Zeroem\JsonSchema\Resolver;

class SchemaResolver implements SchemaResolverInterface
{
    public function resolveSchema($schema) {
        if(is_object($schema)) {
            return $schema;
        }
    } 
}
