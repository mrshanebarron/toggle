<?php

namespace MrShaneBarron\Toggle;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ToggleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-toggle.php', 'ld-toggle');
    }

    public function boot(): void
    {
        Livewire::component('ld-toggle', Livewire\Toggle::class);
        $this->loadViewComponentsAs('ld', [View\Components\Toggle::class]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-toggle');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/ld-toggle.php' => config_path('ld-toggle.php')], 'ld-toggle-config');
        }
    }
}
