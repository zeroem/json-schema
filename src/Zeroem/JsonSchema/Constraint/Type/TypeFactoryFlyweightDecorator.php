<?php

namespace Zeroem\JsonSchema\Constraint\Type;

/**
 * A Flyweight optimization for type constraints.
 *
 * As each Type Constraint does not maintain any internal state, we
 * really don't need any more than one instance of each
 */
class TypeFactoryFlyweightDecorator implements TypeFactoryInterface
{
    /**
     * @var TypeFactoryInterface
     */
    private $factory;

    /**
     * @var array<ConstraintInterface>
     */
    private $cache;

    public function __construct(TypeFactoryInterface $factory) {
        $this->factory = $factory;
    }

    /**
     * Retrieve the object mapped to the given key
     *
     * If the object hasn't already been instantiated, delegate
     * instantiation to the TypeFactoryInterface, storing a reference
     * for future requests
     *
     * @param string $key
     *
     * @return ConstraintInterface
     */
    public function getType($key) {
        if(!isset($this->cache[$key])) {
            $this->cache[$key] = $this->factory->getType($key);
        }

        return $this->cache[$key];
    }
}

