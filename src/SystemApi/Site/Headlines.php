<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Headlines extends Service
{
    public function items($data)
    {
        return $this->c->backend->get('/site/headlines/items', $data);
    }
}