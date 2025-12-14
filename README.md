# Laravel Design Toggle

Toggle switch component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/toggle
```

For Vue components:
```bash
npm install @laraveldesign/toggle
```

## Usage

### Livewire Component

```blade
<livewire:ld-toggle wire:model="notifications" label="Enable notifications" />

{{-- With options --}}
<livewire:ld-toggle
    wire:model="darkMode"
    label="Dark Mode"
    size="lg"
    color="green"
/>

{{-- Disabled state --}}
<livewire:ld-toggle
    wire:model="premium"
    label="Premium features"
    :disabled="!$isPremiumUser"
/>
```

### Blade Component

```blade
<x-ld-toggle name="email_notifications" label="Email notifications" />

<x-ld-toggle
    name="sms_alerts"
    label="SMS Alerts"
    :checked="true"
    size="sm"
    color="purple"
/>

{{-- With Alpine.js --}}
<div x-data="{ darkMode: false }">
    <x-ld-toggle
        name="dark_mode"
        label="Dark Mode"
        x-model="darkMode"
    />
</div>
```

### Vue 3 Component

```vue
<script setup>
import { ref } from 'vue'
import { LdToggle } from '@laraveldesign/toggle'

const notifications = ref(true)
const marketing = ref(false)
</script>

<template>
  <LdToggle v-model="notifications" label="Push notifications" />

  <LdToggle
    v-model="marketing"
    label="Marketing emails"
    size="lg"
    color="green"
  />
</template>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `checked` | boolean | `false` | Toggle state |
| `name` | string | `''` | Input name attribute |
| `label` | string | `null` | Label text |
| `size` | string | `'md'` | Size: `sm`, `md`, `lg` |
| `color` | string | `'blue'` | Active color: `blue`, `green`, `red`, `purple`, `indigo` |
| `disabled` | boolean | `false` | Disable the toggle |

## Events

### Livewire Events

```javascript
Livewire.on('toggle-changed', ({ checked, name }) => {
    console.log(`${name} is now ${checked ? 'on' : 'off'}`);
});
```

### Vue Events

```vue
<LdToggle
  v-model="value"
  @change="handleChange"
/>
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-toggle-config
```

### Custom Colors

```php
// config/ld-toggle.php
'colors' => [
    'blue' => 'bg-blue-600',
    'green' => 'bg-green-600',
    'red' => 'bg-red-600',
    'purple' => 'bg-purple-600',
    'brand' => 'bg-indigo-600',
],
```

### Custom Sizes

```php
// config/ld-toggle.php
'sizes' => [
    'sm' => [
        'track' => 'h-5 w-9',
        'thumb' => 'h-4 w-4',
        'translate' => 'translate-x-4',
    ],
    'md' => [
        'track' => 'h-6 w-11',
        'thumb' => 'h-5 w-5',
        'translate' => 'translate-x-5',
    ],
    'lg' => [
        'track' => 'h-7 w-14',
        'thumb' => 'h-6 w-6',
        'translate' => 'translate-x-7',
    ],
],
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-toggle-views
```

## License

MIT
