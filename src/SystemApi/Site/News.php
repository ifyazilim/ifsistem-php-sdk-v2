<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class News extends Service
{
    public function items($data = null)
    {
        return $this->c->backend->get('/site/news/items', $data);
    }

    public function getById($id)
    {
        return $this->c->backend->get('/site/news/get-by-id/' . $id);
    }
}