<?php

namespace MrShaneBarron\Toggle\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Toggle extends Component
{
    public bool $checked = false;
    public string $size = 'md';
    public string $color = 'blue';
    public ?string $label = null;
    public bool $disabled = false;
    public string $name = '';

    public function mount(
        bool $checked = false,
        string $size = 'md',
        string $color = 'blue',
        ?string $label = null,
        bool $disabled = false,
        string $name = ''
    ): void {
        $this->checked = $checked;
        $this->size = $size;
        $this->color = $color;
        $this->label = $label;
        $this->disabled = $disabled;
        $this->name = $name;
    }

    public function toggle(): void
    {
        if (!$this->disabled) {
            $this->checked = !$this->checked;
            $this->dispatch('toggle-changed', checked: $this->checked, name: $this->name);
        }
    }

    public function render(): View
    {
        return view('ld-toggle::components.toggle', [
            'sizeConfig' => config("ld-toggle.sizes.{$this->size}"),
            'colorClass' => config("ld-toggle.colors.{$this->color}"),
        ]);
    }
}
