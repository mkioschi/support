<?php

namespace Mkioschi\Support\Tests\Types\Misc;

use Mkioschi\Support\Types\Misc\Slug;
use Exception;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_should_be_able_to_create_a_valid_slug()
    {
        $this->assertInstanceOf(Slug::class, Slug::from('some-string'));
        $this->assertEquals('some-string', Slug::from('some-string')->value);
        $this->assertEquals('some-string', Slug::parse('Some string')->value);
        $this->assertFalse(Slug::isValid(''));
        $this->assertTrue(Slug::isValid('a'));
        $this->assertFalse(Slug::isValid(''));
    }
}