<?php

use PHPUnit\Framework\TestCase;
use Tighten\Linters\NoMethodVisibilityInTests;
use Tighten\TLint;

class NoMethodVisibilityInTestsTest extends TestCase
{
    /** @test */
    function does_not_trigger_on_test_method_without_explicit_visibility()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    /** @test */
    function catches_test_method_with_visibility()
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEmpty($lints);
    }

    /** @test */
    function catches_test_method_with_public_visibility()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    /** @test */
    public function catches_test_method_with_visibility()
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEquals(6, $lints[0]->getNode()->getLine());
    }

    /** @test */
    function catches_test_method_with_protected_visibility()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    /** @test */
    protected function catches_test_method_with_visibility()
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEquals(6, $lints[0]->getNode()->getLine());
    }

    /** @test */
    function catches_test_method_with_private_visibility()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    /** @test */
    private function catches_test_method_with_visibility()
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEquals(6, $lints[0]->getNode()->getLine());
    }

    /** @test */
    function catches_static_test_method_with_public_visibility()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    /** @test */
    public static function test_method()
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEquals(6, $lints[0]->getNode()->getLine());
    }

    /** @test */
    function does_not_trigger_on_set_up_method()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    public function setUp() : void
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEmpty($lints);
    }

    /** @test */
    function does_not_trigger_on_set_up_before_class_method()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEmpty($lints);
    }

    /** @test */
    function does_not_trigger_on_tear_down_method()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    public function tearDown() : void
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEmpty($lints);
    }

    /** @test */
    function does_not_trigger_on_tear_down_after_class_method()
    {
        $file = <<<file
<?php

class NoMethodVisibilityInTestsTest extends TestCase
{
    public static function tearDownAfterClass() : void
    {

    }
}

file;

        $lints = (new TLint)->lint(
            new NoMethodVisibilityInTests($file)
        );

        $this->assertEmpty($lints);
    }
}
