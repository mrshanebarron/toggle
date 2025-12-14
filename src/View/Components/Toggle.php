<?php

namespace MrShaneBarron\Toggle\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toggle extends Component
{
    public array $sizeConfig;
    public string $colorClass;

    public function __construct(
        public bool $checked = false,
        public string $size = 'md',
        public string $color = 'blue',
        public ?string $label = null,
        public bool $disabled = false,
        public string $name = ''
    ) {
        $this->sizeConfig = config("ld-toggle.sizes.{$size}");
        $this->colorClass = config("ld-toggle.colors.{$color}");
    }

    public function render(): View
    {
        return view('ld-toggle::components.toggle');
    }
}
