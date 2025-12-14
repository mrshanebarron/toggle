<div
    x-data="{ checked: @entangle('checked').live }"
    class="flex items-center {{ $label ? 'gap-3' : '' }}"
>
    <button
        type="button"
        @click="checked = !checked"
        :class="checked ? '{{ $colorClass }}' : 'bg-gray-200'"
        class="{{ $sizeConfig['track'] }} relative inline-flex shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2 {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
        role="switch"
        :aria-checked="checked"
        @if($disabled) disabled @endif
    >
        <span
            :class="checked ? '{{ $sizeConfig['translate'] }}' : 'translate-x-0'"
            class="{{ $sizeConfig['thumb'] }} pointer-events-none inline-block transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"
        ></span>
    </button>

    @if($label)
        <span class="text-sm font-medium text-gray-900">{{ $label }}</span>
    @endif

    @if($name)
        <input type="hidden" name="{{ $name }}" :value="checked ? '1' : '0'">
    @endif
</div>
