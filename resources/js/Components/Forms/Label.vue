<template>
    <label for="{{ name }}" name="{{ name }}"
    >
        {{ name.replace(/\b\w/g, char => char.toUpperCase()) }}
    </label>
</template>

<script setup>

import {computed} from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true,
        default: "name missing"
    },
});

const name = computed(() => props.name);

</script>
