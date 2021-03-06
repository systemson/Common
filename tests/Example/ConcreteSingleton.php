<?php

namespace Tests\Example;

use Amber\Utils\Implementations\AbstractSingleton;

class ConcreteSingleton extends AbstractSingleton
{
    /**
     * @var self The instance of the class.
     */
    protected static $instance;

    /**
     * To expose publicy a method, the method should be declared protected.
     *
     * @var array The method(s) that should be publicly exposed.
     */
    protected static $passthru = [
        'testMethod',
    ];

    protected function testMethod()
    {
        return null;
    }

    private function privateMethod()
    {
        //
    }
}
