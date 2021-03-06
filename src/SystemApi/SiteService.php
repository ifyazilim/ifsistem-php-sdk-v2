<?php namespace SystemApi;

use SystemApi\Base\Service;
use SystemApi\Site\ContactForms;
use SystemApi\Site\Galleries;
use SystemApi\Site\Headlines;
use SystemApi\Site\Menus;
use SystemApi\Site\News;
use SystemApi\Site\Pages;
use SystemApi\Site\Products;
use SystemApi\Site\References;
use SystemApi\Site\Settings;
use SystemApi\Site\Testimonials;

class SiteService extends Service
{
    /**
     * @Inject
     * @var Settings
     */
    public $settings;

    /**
     * @Inject
     * @var Pages
     */
    public $pages;

    /**
     * @Inject
     * @var ContactForms
     */
    public $contactForms;

    /**
     * @Inject
     * @var Products
     */
    public $products;

    /**
     * @Inject
     * @var Headlines
     */
    public $headlines;

    /**
     * @Inject
     * @var Galleries
     */
    public $galleries;

    /**
     * @Inject
     * @var News
     */
    public $news;

    /**
     * @Inject
     * @var Menus
     */
    public $menus;

    /**
     * @Inject
     * @var References
     */
    public $references;

    /**
     * @Inject
     * @var Testimonials
     */
    public $testimonials;
}