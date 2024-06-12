<template>
    <label class="block mb-2 uppercase font-bold text-xs text-white"
           for="{{ name }}" name="{{ name }}"
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
