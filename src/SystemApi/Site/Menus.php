<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Menus extends Service
{
    public function elements($data = null)
    {
        return $this->c->backend->get('/menus/elements', $data);
    }
}