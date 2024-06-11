<template>
    <Head title="Home" />

    <Feed  :posts="posts"/>
</template>

<script setup>
import {Head, Link, usePage} from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import Feed from '@/Components/Posts/Feed.vue';
import {computed, ref} from "vue";
// import Head from '@/Components/Layout/Head.vue';
defineOptions({ layout: HomeLayout })

defineProps({
    posts: {
        type: Object,
        required: true
    },
});

const page = usePage();
// create ref from posts prop
const posts = computed(() => page.props.posts.data)
</script>
