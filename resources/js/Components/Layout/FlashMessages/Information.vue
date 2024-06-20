<template>
    <div class="rounded-md bg-blue-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <InformationCircleIcon class="h-5 w-5 text-blue-400" aria-hidden="true" />
            </div>
            <div class="ml-3 flex-1 md:flex md:justify-between">
                <p class="text-sm text-blue-700">{{ message }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { InformationCircleIcon } from '@heroicons/vue/20/solid'

const props = defineProps({
    message: {
        type: String,
        default: "",
    }
});
</script>
