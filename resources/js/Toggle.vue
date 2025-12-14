<template>
  <label :class="['inline-flex items-center gap-3', disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer']">
    <button
      type="button"
      role="switch"
      :aria-checked="modelValue"
      :disabled="disabled"
      @click="toggle"
      :class="[sizeConfig.track, 'relative inline-flex shrink-0 rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2', modelValue ? 'bg-blue-600' : 'bg-gray-200']"
    >
      <span
        :class="[sizeConfig.thumb, 'pointer-events-none inline-block transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out', modelValue ? sizeConfig.translate : 'translate-x-0']"
      ></span>
    </button>
    <span v-if="label" class="text-sm font-medium text-gray-900">{{ label }}</span>
  </label>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'SbToggle',
  props: {
    modelValue: { type: Boolean, default: false },
    disabled: { type: Boolean, default: false },
    size: { type: String, default: 'md' },
    label: { type: String, default: null }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const sizes = {
      sm: { track: 'w-8 h-4', thumb: 'w-3 h-3', translate: 'translate-x-4' },
      md: { track: 'w-11 h-6', thumb: 'w-5 h-5', translate: 'translate-x-5' },
      lg: { track: 'w-14 h-7', thumb: 'w-6 h-6', translate: 'translate-x-7' }
    };
    const sizeConfig = computed(() => sizes[props.size] || sizes.md);
    const toggle = () => { if (!props.disabled) emit('update:modelValue', !props.modelValue); };
    return { sizeConfig, toggle };
  }
};
</script>
