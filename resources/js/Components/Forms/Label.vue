<template>
    <label class="block mb-2 uppercase font-bold text-xs text-white"
           for="{{ name }}" name="{{ name }}"
    >
        {{ formattedName }}
    </label>
</template>

<script setup>

import {computed} from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
});
const formattedName = computed(() => {
    return props.name
        .split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
});

</script>
