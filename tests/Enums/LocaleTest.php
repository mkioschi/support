<?php

namespace Mkioschi\Support\Tests\Enums;

use Mkioschi\Support\Enums\Locale;
use PHPUnit\Framework\TestCase;

class LocaleTest extends TestCase
{
    public function test_should_be_able_to_create_a_valid_country()
    {
        $englishUnitedStates = Locale::EN_US;
        $this->assertInstanceOf(Locale::class, $englishUnitedStates);
        $this->assertEquals('en_US', $englishUnitedStates->value);
        $this->assertEquals('English (United States)', $englishUnitedStates->label());
    }
}