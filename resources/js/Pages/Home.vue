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

</script>

<template>
    <Head title="Home" />
    <HomeLayout :categories="categories" :currentCategory="currentCategory" :posts="posts">

        <Feed  :posts="posts"/>
    </HomeLayout>
</template>
