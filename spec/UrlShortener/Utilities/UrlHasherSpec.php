<?php namespace spec\UrlShortener\Utilities;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UrlHasherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('UrlShortener\Utilities\UrlHasher');
    }

    function it_should_return_a_hashed_url_as_string()
    {
        $this->make('http://google.com')->shouldBeString();
    }
}
