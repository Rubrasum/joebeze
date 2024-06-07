<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import HeroSection from '@/Components/Layout/HeroSection.vue';
import SimpleBlurb from '@/Components/Layout/SimpleBlurb.vue';
import GraphicsBlurb from '@/Components/Layout/GraphicsBlurb.vue';
import GraphicsBlurb2 from '@/Components/Layout/GraphicsBlurb2.vue';
import ClientReviews from '@/Components/Layout/ClientReviews.vue';
import ContactForm from '@/Components/Layout/ContactForm.vue';
import ApplicationMark from '@/Components/Default/ApplicationMark.vue';
import PostsFeaturedCard from "@/Components/Posts/PostsFeaturedCard.vue";
// import Head from '@/Components/Layout/Head.vue';
</script>

<template>
    <Head title="Home" />
    <HomeLayout :categories="categories" :posts="posts">

<!--        <FeaturedCard :post="posts[0]" />-->

<!--        <div v-for="post in posts.slice(1)" :key="post.id">-->
<!--            <Card :post="post" />-->
<!--        </div>-->
    </HomeLayout>
</template>
