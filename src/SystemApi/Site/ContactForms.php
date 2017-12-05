<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class ContactForms extends Service
{
    public function add($data)
    {
        return $this->c->backend->post('/site/contact-form/add', $data);
    }
}