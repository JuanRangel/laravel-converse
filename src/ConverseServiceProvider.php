<?php

namespace JuanRangel\Converse;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use JuanRangel\Converse\Commands\ConverseCommand;
use JuanRangel\Converse\Http\Controllers\ConversationController;
use JuanRangel\Converse\Http\Livewire\Conversations\ConversationHeader;
use JuanRangel\Converse\Http\Livewire\Conversations\ConversationList;
use JuanRangel\Converse\Http\Livewire\Conversations\ConversationMessages;
use JuanRangel\Converse\Http\Livewire\Conversations\ConversationReply;
use Livewire\Livewire;

class ConverseServiceProvider extends ServiceProvider
{
    public function boot() : void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/converse.php' => config_path('converse.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/converse'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
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
                Route::middleware('web')->group(function () {
                    Route::get('/', [ConversationController::class, 'index'])->name('conversations.index')->middleware('auth');
                    Route::get('{conversation:uuid}', [ConversationController::class, 'show'])->name('conversations.show')->middleware('auth');
                });

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
        Livewire::component('converse::conversations.conversation-list', ConversationList::class);
        Livewire::component('converse::conversations.conversation-header', ConversationHeader::class);
        Livewire::component('converse::conversations.conversation-messages', ConversationMessages::class);
        Livewire::component('converse::conversations.conversation-reply', ConversationReply::class);
    }

    public function register() : void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/converse.php', 'converse');
        $this->app->singleton(Converse::class, function () {
            return new Converse;
        });
    }
}
