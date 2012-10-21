<?php

namespace Zeroem\JsonSchema\Resolver;

interface SchemaResolverInterface
{
    /**
     * Resolve a schema URI to an actual schema object
     *
     * @param string $schema URI to schema
     *
     * @return object
     */
    public function resolve($schema);
}
