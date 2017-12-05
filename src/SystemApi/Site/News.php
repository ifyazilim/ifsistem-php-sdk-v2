<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class News extends Service
{
    public function items($data)
    {
        return $this->c->backend->get('/site/news/items', $data);
    }
}