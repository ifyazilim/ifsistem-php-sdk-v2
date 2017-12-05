<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Settings extends Service
{
    public function items()
    {
        return $this->c->backend->get('/site/settings/items');
    }
}