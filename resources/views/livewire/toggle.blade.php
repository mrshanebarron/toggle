@php
$sizes = [
    'sm' => ['track' => 'w-8 h-4', 'thumb' => 'w-3 h-3', 'translate' => 'translate-x-4'],
    'md' => ['track' => 'w-11 h-6', 'thumb' => 'w-5 h-5', 'translate' => 'translate-x-5'],
    'lg' => ['track' => 'w-14 h-7', 'thumb' => 'w-6 h-6', 'translate' => 'translate-x-7'],
];
$s = $sizes[$size] ?? $sizes['md'];
@endphp

<label class="inline-flex items-center gap-3 {{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }}">
    <button
        type="button"
        role="switch"
        wire:click="toggle"
        aria-checked="{{ $checked ? 'true' : 'false' }}"
        @if($disabled) disabled @endif
        class="{{ $s['track'] }} relative inline-flex shrink-0 rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 {{ $checked ? 'bg-blue-600' : 'bg-gray-200' }}"
    >
        <span
            class="{{ $s['thumb'] }} pointer-events-none inline-block transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out {{ $checked ? $s['translate'] : 'translate-x-0' }}"
        ></span>
    </button>
    @if($label)
        <span class="text-sm font-medium text-gray-900">{{ $label }}</span>
    @endif
    @if($name)
        <input type="hidden" name="{{ $name }}" value="{{ $checked ? '1' : '0' }}">
    @endif
</label>
