<?php

namespace MrShaneBarron\Toggle\Livewire;

use Livewire\Component;

class Toggle extends Component
{
    public bool $checked = false;
    public bool $disabled = false;
    public string $size = 'md';
    public ?string $label = null;
    public ?string $name = null;

    public function mount(bool $checked = false, bool $disabled = false, string $size = 'md', ?string $label = null, ?string $name = null): void
    {
        $this->checked = $checked;
        $this->disabled = $disabled;
        $this->size = $size;
        $this->label = $label;
        $this->name = $name;
    }

    public function toggle(): void
    {
        if (!$this->disabled) {
            $this->checked = !$this->checked;
            $this->dispatch('toggle-changed', checked: $this->checked);
        }
    }

    public function render()
    {
        return view('sb-toggle::livewire.toggle');
    }
}
