<?php namespace SystemApi;

/**
 * @property UtilService util
 * @property BackendService backend
 */
class Container extends \DI\Container
{
    public function __get($name)
    {
        return $this->get($name);
    }
}