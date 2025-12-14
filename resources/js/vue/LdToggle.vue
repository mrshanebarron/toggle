<script setup lang="ts">
import { computed } from 'vue'

interface Props {
  modelValue?: boolean
  size?: 'sm' | 'md' | 'lg'
  color?: 'blue' | 'green' | 'red' | 'purple'
  label?: string
  disabled?: boolean
  name?: string
}

const props = withDefaults(defineProps<Props>(), {
  modelValue: false,
  size: 'md',
  color: 'blue',
  disabled: false,
})

const emit = defineEmits<{
  (e: 'update:modelValue', value: boolean): void
}>()

const sizes = {
  sm: { track: 'w-8 h-4', thumb: 'w-3 h-3', translate: 'translate-x-4' },
  md: { track: 'w-11 h-6', thumb: 'w-5 h-5', translate: 'translate-x-5' },
  lg: { track: 'w-14 h-7', thumb: 'w-6 h-6', translate: 'translate-x-7' },
}

const colors = {
  blue: 'bg-blue-600',
  green: 'bg-green-600',
  red: 'bg-red-600',
  purple: 'bg-purple-600',
}

const sizeConfig = computed(() => sizes[props.size])
const colorClass = computed(() => colors[props.color])

function toggle() {
  if (!props.disabled) {
    emit('update:modelValue', !props.modelValue)
  }
}
</script>

<template>
  <div :class="['flex items-center', label ? 'gap-3' : '']">
    <button
      type="button"
      @click="toggle"
      :class="[
        sizeConfig.track,
        modelValue ? colorClass : 'bg-gray-200',
        'relative inline-flex shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200',
        disabled ? 'opacity-50 cursor-not-allowed' : ''
      ]"
      role="switch"
      :aria-checked="modelValue"
      :disabled="disabled"
    >
      <span
        :class="[
          sizeConfig.thumb,
          modelValue ? sizeConfig.translate : 'translate-x-0',
          'pointer-events-none inline-block transform rounded-full bg-white shadow transition duration-200'
        ]"
      />
    </button>
    <span v-if="label" class="text-sm font-medium text-gray-900">{{ label }}</span>
    <input v-if="name" type="hidden" :name="name" :value="modelValue ? '1' : '0'">
  </div>
</template>
