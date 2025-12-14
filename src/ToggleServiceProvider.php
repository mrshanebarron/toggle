<?php

namespace MrShaneBarron\Toggle;

use Illuminate\Support\ServiceProvider;

class ToggleServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-toggle', Livewire\Toggle::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-toggle');
    }
}
