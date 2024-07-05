<template>
    <Head title="Home" />
    <div class="bg-primary-bg ">
        <div class="w-full relative border-double border-b-4 border-secondary-bg  overflow-hidden z-10">
            <div class="top-0 left-0 bg-primary-bg bg-opacity-60 flex flex-col justify-between mx-[10vw]">
                <MainHero />
            </div>
        </div>

        <div class="w-full relative  border-b-2 border-secondary-bg">
            <div class="top-0 left-0 bg-primary-bg bg-opacity-60 border-accent mx-[10vw]">
                <Feed  :posts="posts"/>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Head, Link, usePage} from '@inertiajs/vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import MainHero from '@/Components/MainHero.vue';
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
