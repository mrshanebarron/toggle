# Toggle

A switch/toggle component for Laravel applications. Perfect for boolean settings and on/off states. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/toggle
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-toggle wire:model="notifications" />
```

### With Label

```blade
<livewire:sb-toggle wire:model="darkMode" label="Enable Dark Mode" />
```

### Different Sizes

```blade
<livewire:sb-toggle wire:model="setting" size="sm" />
<livewire:sb-toggle wire:model="setting" size="md" />
<livewire:sb-toggle wire:model="setting" size="lg" />
```

### Disabled State

```blade
<livewire:sb-toggle wire:model="locked" :disabled="true" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wire:model` | boolean | required | Bound value |
| `label` | string | `null` | Label text beside toggle |
| `size` | string | `'md'` | Size: `sm`, `md`, `lg` |
| `disabled` | boolean | `false` | Disable interaction |

## Vue 3 Usage

### Setup

```javascript
import { SbToggle } from './vendor/sb-toggle';
app.component('SbToggle', SbToggle);
```

### Basic Usage

```vue
<template>
  <SbToggle v-model="enabled" />
</template>

<script setup>
import { ref } from 'vue';
const enabled = ref(false);
</script>
```

### With Label

```vue
<template>
  <SbToggle v-model="notifications" label="Enable Notifications" />
</template>
```

### Sizes

```vue
<template>
  <SbToggle v-model="value" size="sm" label="Small" />
  <SbToggle v-model="value" size="md" label="Medium" />
  <SbToggle v-model="value" size="lg" label="Large" />
</template>
```

### In a Form

```vue
<template>
  <form @submit.prevent="save">
    <div class="space-y-4">
      <SbToggle v-model="settings.darkMode" label="Dark Mode" />
      <SbToggle v-model="settings.notifications" label="Push Notifications" />
      <SbToggle v-model="settings.marketing" label="Marketing Emails" />
    </div>
    <button type="submit">Save Settings</button>
  </form>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modelValue` | Boolean | `false` | Bound value (v-model) |
| `disabled` | Boolean | `false` | Disable toggle |
| `size` | String | `'md'` | Size: `sm`, `md`, `lg` |
| `label` | String | `null` | Label text |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `update:modelValue` | `boolean` | Emitted when toggled |

## Sizes Reference

| Size | Track | Thumb |
|------|-------|-------|
| `sm` | 32x16px | 12x12px |
| `md` | 44x24px | 20x20px |
| `lg` | 56x28px | 24x24px |

## Accessibility

- `role="switch"` attribute
- `aria-checked` reflects state
- Focus ring for keyboard navigation
- Keyboard support (Enter/Space)

## Styling

Uses Tailwind CSS:
- Blue background when on
- Gray background when off
- White thumb with shadow
- Smooth transition animation

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
