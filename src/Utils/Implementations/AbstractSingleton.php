<?php

namespace Amber\Utils\Implementations;

/**
 * Implementation of a singleton class.
 */
abstract class AbstractSingleton
{
    /**
     * Prevents instantiation.
     */
    final private function __construct()
    {
    }

    /**
     * Prevents clonation.
     */
    final public function __clone()
    {
        throw new \Exception('Cannot clone "[' . get_called_class() . ']"');
    }

    /**
     * Prevents unserialization.
     */
    final public function __wakeup()
    {
        throw new \Exception('Cannot unserialize ["' . get_called_class() . '"]');
    }

    /**
     * Returns the instance of the class.
     */
    public static function getInstance()
    {
        if (!static::$instance instanceof static) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Runs before every action call
     *
     * @return void
     */
    public static function beforeCall(): void
    {
        //
    }

    /**
     * Runs after every action call
     *
     * @return void
     */
    public static function afterCall(): void
    {
        //
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array   $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args = [])
    {
        if (empty(static::$passthru) || array_search($method, static::$passthru) !== false) {
            static::beforeCall();
            $return = call_user_func_array([static::getInstance(), $method], $args);
            static::afterCall();

            return $return;
        }

        $class = get_called_class();

        if (method_exists(static::class, $method)) {
            throw new \Exception("Non-static method {$class}::{$method}() should not be called statically");
        }

        throw new \Error("Call to undefined {$class}::{$method}()");
    }
}
