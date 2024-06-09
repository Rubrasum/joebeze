<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import Feed from '@/Components/Posts/Feed.vue';
// import Head from '@/Components/Layout/Head.vue';

defineProps({
    categories: {
        type: Array,
        required: true
    },
    currentCategory: {
        type: Object,
        default: null
    },
    posts: {
        type: Object,
        required: true
    },
});
defineOptions({ layout: HomeLayout })

</script>

<template>
    <Head title="Home" />

    <Feed  :posts="posts"/>
</template>
