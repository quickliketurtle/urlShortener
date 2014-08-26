<?php
session_start();
// define a working directory
define('APP_PATH', dirname(__FILE__) . '/'); // PHP v5.3+

// load
require APP_PATH . '/vendor/autoload.php';

// initialize ActiveRecord - this should be somewhere else
\ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('.');
    $cfg->set_connections(array('development' => 'sqlite://src/UrlShortener/production.sqlite'));
});

// init app
$app = New \SlimController\Slim([
    'templates.path'             => APP_PATH . 'src/templates',
    'controller.class_prefix'    => '\\UrlShortener\\Controllers',
    'controller.method_suffix'   => '',
    'controller.template_suffix' => 'php',
]);

$app->addRoutes([
    '/'         => ['get' => 'Links:index'],
    '/:hash'    => ['get' => 'Links:getUrlbyHash'],
    '/links'    => ['post' => 'Links:store']
]);

$app->run();
