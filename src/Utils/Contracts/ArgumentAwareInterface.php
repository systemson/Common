<?php

namespace Amber\Utils\Contracts;

use ReflectionClass;

interface ArgumentAwareInterface
{
    /**
     * Sets the class constructor arguments.
     *
     * @var mixed $args The arguments for the class constructor.
     *
     * @return void
     */
    public static function setArguments(...$args): void;

    /**
     * Gets the class constructor arguments.
     *
     * @return array The arguments for the class constructor.
     */
    public static function getArguments(): array;
}