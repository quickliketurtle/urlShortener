<?php namespace UrlShortener\Utilities;

class UrlHasher
{
    protected $hashLength = 5;

    public function make($url)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $this->hashLength);
    }
}
