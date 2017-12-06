<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class References extends Service
{
    public function items($data = null)
    {
        return $this->c->backend->get('/site/references/items', $data);
    }

    public function getById($id)
    {
        return $this->c->backend->get('/site/references/get-by-id/' . $id);
    }
}