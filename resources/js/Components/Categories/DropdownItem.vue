<template>
    <a :class="classes">
        <slot></slot>
    </a>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    active: {
        type: Boolean,
        default: false
    }
})

const classes = computed(() => {
    let baseClasses = "block text-left text-black px-3 text-sm leading-6 hover:text-white hover:bg-blue-300 focus:bg-blue-300 focus:text-white"
    if (props.active) {
        baseClasses += ' bg-blue-500 text-white'
    }
    return baseClasses
})
</script>
