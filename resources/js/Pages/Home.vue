<template>
    <Head title="Home" />

    <Feed  :posts="posts"/>
</template>

<script setup>
import {Head, Link, usePage} from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import Feed from '@/Components/Posts/Feed.vue';
import {computed} from "vue";
// import Head from '@/Components/Layout/Head.vue';
defineOptions({ layout: HomeLayout })

defineProps({
    posts: {
        type: Object,
        required: true
    },
    currentCategory: {
        type: Object,
        required: false
    },
    search: {
        type: String,
        required: false
    },
});

const page = usePage();
// create ref from posts prop
const posts = computed(() => page.props.posts.data)
const search = computed(() => page.props.search)
</script>
