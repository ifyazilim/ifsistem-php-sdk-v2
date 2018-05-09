<?php

class ServicesTest extends \PHPUnit\Framework\TestCase
{
    private $token = '';

    public function testGenel()
    {
        $client = new \SystemApi\ApiClient();

        $client->setBaseUrl('http://backend.ifsistem.test');
        $client->setToken($this->token);
        $client->setLangId(1);
        $client->setIp('127.0.0.1');

        $settings = $client->site->settings->items();

        $this->assertTrue(is_object($settings));
    }

    public function testTestimonials()
    {
        $client = new \SystemApi\ApiClient();

        $client->setBaseUrl('http://backend.ifsistem.test');
        $client->setToken($this->token);
        $client->setLangId(1);
        $client->setIp('127.0.0.1');

        $items = $client->site->testimonials->items();

        $this->assertTrue(is_object($items));
    }
}