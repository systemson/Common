<?php

namespace Amber\Config;

trait ConfigAware
{
    /**
     * @var array The config container.
     */
    protected $config = [];

    /**
     * Sets the config enviroment variables.
     *
     * @param array $config A asociative array containing the config variables.
     *
     * @return void
     */
    public function setConfig(array $config)
    {
        foreach ($config as $key => $value) {
            $this->config[$key] = $value;
        }
    }

    /**
     * gets a config enviroment variables by it's key.
     *
     * @param string $key The key to search for.
     * @param mixed  $default The defualt value to return if the key is not found.
     *
     * @return mixed The config value.
     */
    public function getConfig(string $key, $default = null)
    {
        $config = $this->config;

        foreach (explode('.', $key) as $search) {
            if (isset($config[$search])) {
                $config = $config[$search];
            } else {
                return $default;
            }
        }

        return $config;
    }
}
