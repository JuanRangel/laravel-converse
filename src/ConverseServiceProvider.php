<?php

namespace Vsellis\Converse;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Vsellis\Converse\Commands\ConverseCommand;
use Vsellis\Converse\Http\Controllers\ConversationController;
use Vsellis\Converse\Http\Livewire\Conversations\ConversationHeader;
use Vsellis\Converse\Http\Livewire\Conversations\ConversationList;
use Vsellis\Converse\Http\Livewire\Conversations\ConversationMessages;
use Vsellis\Converse\Http\Livewire\Conversations\ConversationReply;
use Vsellis\Converse\Http\Livewire\TestComponent;

class ConverseServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-converse.php' => config_path('laravel-converse.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-converse'),
            ], 'views');

            if (!class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__.'/../database/migrations/create_converse_tables.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_converse_tables.php'),
                ], 'migrations');
            }

            $this->commands([
                ConverseCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'converse');

        Route::macro('converse', function (string $prefix) {
            Route::prefix($prefix)->group(function () {
                Route::get('/', [ConversationController::class, 'index'])->name('conversations.index');
                Route::get('{conversation:uuid}', [ConversationController::class, 'show'])->name('conversations.show')->middleware('bindings');


                /**
                 * Broadcasting Channels
                 */
                Broadcast::channel('conversations.{id}', function ($user, $id) {
                    return $user->inConversation($id);
                });
            });
        });

        /**
         * Livewire Components
         */
//        Livewire::component('converse::test-component', TestComponent::class);
        Livewire::component('converse::conversations.conversation-list', ConversationList::class);
        Livewire::component('converse::conversations.conversation-header', ConversationHeader::class);
        Livewire::component('converse::conversations.conversation-messages', ConversationMessages::class);
        Livewire::component('converse::conversations.conversation-reply', ConversationReply::class);
    }

    public function register() : void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/converse.php', 'converse');
    }
}
