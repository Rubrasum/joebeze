<template>
    <div v-if="errorMessage" >
        <p class="text-red-500 text-xs mt-2">{{ errorMessage }}</p>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue';
import {usePage} from "@inertiajs/vue3";
const props = defineProps({
    name: {
        type: String,
        required: true,
    },
});

const page = usePage();

// Compute the error message for the given field name
const errorMessage = computed(() => {
    return page.props.value.errors[props.name] ? page.props.value.errors[props.name][0] : '';
});



</script>
