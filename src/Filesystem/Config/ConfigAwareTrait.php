<?php

namespace Amber\Cache\Config;

use Amber\Config\ConfigAwareTrait as BaseConfig;

trait ConfigAwareTrait
{
    use BaseConfig;

    public function getBasePathConfig()
    {
        return $this->getConfig('base_path', getcwd());
    }
}
