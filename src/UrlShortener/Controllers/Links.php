<?php namespace UrlShortener\Controllers;

use UrlShortener\Link;
use UrlShortener\Utilities\UrlHasher;

/**
 * Class Links
 * @package UrlShortener\Controllers
 */
class Links extends \SlimController\SlimController
{
    /**
     * @var \UrlShortener\Utilities\UrlHasher
     */
    protected $urlHasher;

    /**
     * @var \Slim\Slim
     */
    protected $app;

    /**
     * @param \Slim\Slim $app
     */
    public function __construct($app)
    {
        Parent::__construct($app);
        $this->urlHasher = new UrlHasher();
        $this->app = $app;
    }

    /**
     *
     */
    public function index()
    {
        $this->render('links/index');
    }

    /**
     *
     */
    public function store()
    {
        $request = $this->app->request();

        $url = $_POST['url'];
        $link = Link::find_by_url($url);

        if ($link) {
            $this->app->flash('flash_message', $request->getUrl() . "/" . $link->hash);
            $this->app->redirect('/');
        }

        $hash = $this->urlHasher->make($url);

        $link = Link::create([
            'url' => $url,
            'hash' => $hash
        ]);

        $this->app->flash('flash_message', $hash);
        $this->app->redirect('/');
    }

    /**
     * @param $hash
     */
    public function getUrlByHash($hash)
    {
        $link = Link::find_by_hash($hash);
        if (!$link) {
            $this->app->flash('error', 'Invalid Hash - No Url found');
            $this->app->redirect('/');
        }
        $this->app->redirect($link->url);
    }
}
