<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Galleries extends Service
{
    public function items($data)
    {
        return $this->c->backend->get('/site/galleries/items', $data);
    }

    public function getById($id)
    {
        return $this->c->backend->get('/site/galleries/get-by-id/' . $id);
    }

    public function contents($data)
    {
        return $this->c->backend->get('/site/galleries/contents', $data);
    }
}