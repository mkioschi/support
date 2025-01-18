<?php

namespace Mkioschi\Support\Tests\Types\Web;

use Mkioschi\Support\Types\Web\FileName;
use PHPUnit\Framework\TestCase;

class FileNameTest extends TestCase
{
    public function test_should_be_able_to_create_a_valid_file_name()
    {
        $this->assertInstanceOf(FileName::class, FileName::from('test.txt'));
    }
}