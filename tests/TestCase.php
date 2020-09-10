<?php

namespace Masry\Lighthouse\tests;

use Masry\Lighthouse\LighthouseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(dirname(__FILE__, 2)."/database/factories");
    }

    protected function getPackageProviders($app)
    {
        return [
            LighthouseServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once dirname(__FILE__, 2). "/database/migrations/create_posts_table.php.stub";

        (new CreatePostsTable)->up();
    }
}
