<?php

namespace JuanRangel\Converse\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Route;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use JuanRangel\Converse\ConverseServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->withFactories(__DIR__.'/database/factories');
        $this->setUpDatabase($this->app);

        Route::converse('conversations');
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            ConverseServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
        $app['config']->set('auth.providers.users.model', User::class);
        $app['config']->set('models.conversables', [
            'users' => User::class,
            'pages' => Page::class,
        ]);

        $app['config']->set('app.key', 'base64:Hupx3yAySikrM2/edkZQNQHslgDWYfiBfCuSThJ5SK8=');

        include_once __DIR__.'/../database/migrations/create_converse_tables.php.stub';
        (new \CreateConverseTables())->up();
    }

    private function setUpDatabase(\Illuminate\Foundation\Application $app)
    {
        $app['db']->connection()->getSchemaBuilder()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('name');
            $table->softDeletes();
        });

        $app['db']->connection()->getSchemaBuilder()->create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('page_id');
            $table->softDeletes();
        });

        User::create(['email' => 'john@example.com', 'name' => 'John Doe']);
        User::create(['email' => 'jane@example.com', 'name' => 'Jane Doe']);
        Page::create(['name' => 'Test Facebook Page 1', 'page_id' => 1]);
        Page::create(['name' => 'Test Facebook Page 2', 'page_id' => 2]);
    }
}
