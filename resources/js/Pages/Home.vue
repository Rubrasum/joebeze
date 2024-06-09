<template>
    <Head title="Home" />

    <Feed  :posts="posts"/>
</template>

<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import Feed from '@/Components/Posts/Feed.vue';
// import Head from '@/Components/Layout/Head.vue';

defineProps({
    posts: {
        type: Object,
        required: true
    },
});
defineOptions({ layout: HomeLayout })

</script>
