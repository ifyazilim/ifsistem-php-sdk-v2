<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Testimonials extends Service
{
    public function items($data = null)
    {
        return $this->c->backend->get('/site/testimonials/items', $data);
    }
}