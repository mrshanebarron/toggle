@php
$sizes = [
    'sm' => ['track' => 'width: 32px; height: 16px;', 'thumb' => 'width: 12px; height: 12px;', 'translate' => 'translateX(16px)'],
    'md' => ['track' => 'width: 44px; height: 24px;', 'thumb' => 'width: 20px; height: 20px;', 'translate' => 'translateX(20px)'],
    'lg' => ['track' => 'width: 56px; height: 28px;', 'thumb' => 'width: 24px; height: 24px;', 'translate' => 'translateX(28px)'],
];
$s = $sizes[$this->size] ?? $sizes['md'];
@endphp

<label style="display: inline-flex; align-items: center; gap: 12px; {{ $this->disabled ? 'opacity: 0.5; cursor: not-allowed;' : 'cursor: pointer;' }}">
    <button
        type="button"
        role="switch"
        wire:click="toggle"
        aria-checked="{{ $this->checked ? 'true' : 'false' }}"
        @if($this->disabled) disabled @endif
        style="{{ $s['track'] }} position: relative; display: inline-flex; flex-shrink: 0; border-radius: 9999px; border: 2px solid transparent; transition: background-color 0.2s; background: {{ $this->checked ? '#2563eb' : '#e5e7eb' }};"
    >
        <span style="{{ $s['thumb'] }} pointer-events: none; display: inline-block; transform: {{ $this->checked ? $s['translate'] : 'translateX(0)' }}; border-radius: 9999px; background: white; box-shadow: 0 1px 3px rgba(0,0,0,0.1); transition: transform 0.2s;"></span>
    </button>
    @if($this->label)
        <span style="font-size: 14px; font-weight: 500; color: #111827;">{{ $this->label }}</span>
    @endif
    @if($this->name)
        <input type="hidden" name="{{ $this->name }}" value="{{ $this->checked ? '1' : '0' }}">
    @endif
</label>
