<?php namespace SystemApi\Site;

use SystemApi\Base\Service;

class Products extends Service
{
    public function categoryList()
    {
        return $this->c->backend->get('/site/products/category-list');
    }

    public function items($data)
    {
        return $this->c->backend->get('/site/products/items', $data);
    }

    public function attributeGroupList($data)
    {
        return $this->c->backend->get('/site/products/attribute-group-list', $data);
    }

    public function getById($id)
    {
        return $this->c->backend->get('/site/products/get-by-id/' . $id);
    }
}