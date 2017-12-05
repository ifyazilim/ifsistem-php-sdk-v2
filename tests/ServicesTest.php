<?php

class ServicesTest extends \PHPUnit\Framework\TestCase
{
    public function testGenel()
    {
        $client = new \SystemApi\ApiClient();

        $client->setBaseUrl('http://backend.ifsistem.app');
        $client->setToken('');
        $client->setLangId(1);
        $client->setIp('127.0.0.1');

        $settings = $client->site->settings->items();

        $this->assertTrue(is_object($settings));
    }
}