<?php namespace SystemApi;

use DI\ContainerBuilder;
use function DI\get;

/**
 * @property SiteService site
 */
class ApiClient
{
    /**
     * @var Container
     */
    public $container;

    public function __construct()
    {
        $builder = new ContainerBuilder(Container::class);
        $builder->useAnnotations(true);
        $builder->addDefinitions([

            'util' => get(UtilService::class),

            'site' => get(SiteService::class),

            'backend' => get(BackendService::class),

            Container::class => get(\DI\Container::class),

        ]);
        $this->container = $builder->build();
    }

    /**
     * @param string $token
     * @return self
     */
    public function setToken($token)
    {
        $this->container->backend->token = $token;

        return $this;
    }

    /**
     * @param int $langId
     * @return self
     */
    public function setLangId($langId)
    {
        $this->container->backend->langId = $langId;

        return $this;
    }

    /**
     * @param string $baseUrl
     * @return self
     */
    public function setBaseUrl($baseUrl)
    {
        $this->container->backend->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param string $ip
     * @return self
     */
    public function setIp($ip)
    {
        $this->container->backend->ip = $ip;

        return $this;
    }

    public function __get($name)
    {
        return $this->container->get($name);
    }
}