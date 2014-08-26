<?php namespace UrlShortener;

require_once 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';

use ActiveRecord\Config;
use ActiveRecord\Model;

class Link extends Model {

    static $table_name = 'links';

    static $primary_key = 'url';
}
