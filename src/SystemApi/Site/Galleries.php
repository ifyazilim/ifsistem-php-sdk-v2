<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Galleries extends Service
{
    public function contents($data)
    {
        return $this->c->backend->get('/site/galleries/contents', $data);
    }
}