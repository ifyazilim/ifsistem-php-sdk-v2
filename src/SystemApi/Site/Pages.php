<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Pages extends Service
{
    public function items($data)
    {
        return $this->c->backend->get('/site/pages/items', $data);
    }

    public function getByCode($code)
    {
        return $this->c->backend->get('/site/pages/get-by-code/' . $code);
    }

    public function getById($id)
    {
        return $this->c->backend->get('/site/pages/get-by-id/' . $id);
    }
}