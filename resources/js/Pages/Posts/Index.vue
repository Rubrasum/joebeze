<template>
    <div>
        <Feed :posts="posts"/>
    </div>
</template>

<script setup>

// Props
const props = defineProps({
    posts: {
        type: Array,
        required: true
    }
});
</script>
