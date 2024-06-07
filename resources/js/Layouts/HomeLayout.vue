<script setup>
// Importing necessary functions and components from Vue and Inertia.js
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Layout/Banner.vue';
import MainContain from '@/Components/Layout/MainContain.vue';
import Footer from '@/Components/Layout/Footer.vue';
import PrimaryNav from '@/Components/Layout/PrimaryNav.vue';
import Head from '@/Components/Layout/Head.vue'
import ResponsiveNav from '@/Components/Layout/ResponsiveNav.vue';


// SAMPLE CODE FOR PAGE //////////////////////////////////////////////////////////////////////////////////////////////

// Defining properties for the component
defineProps({
    title: String,
    categories: {
        type: Array,
        required: true
    },
    category: {
        type: Object,
        default: null
    },
    posts: {
        type: Array,
        required: true
    },
});

// Function to log out the user
const logout = () => {
    router.post(route('logout'));
};


</script>

<template>
    <!-- HELLO HEADER -->
    <div class="">
<!--        <Banner />-->

        <!-- Holds most of the page content and in a particular layout -->
        <!-- If everything is in this container, that represents the simplicity of the design -->
        <!-- more complicated designs might have slightly more complicated container layouts.
        Maybe nav and banner are both without containers. Who the fuck nose. So a full design will include unqiue -->
        <MainContain>
            <!-- Primary Navigation Menu -->
            <PrimaryNav :categories="categories" :category="category" />

            <!-- Secondary Navigation Menu -->
            <!--            <ResponsiveNav />-->

            <!-- page -->
            <slot></slot>
        </MainContain>

        <Footer />
    </div>
</template>

<style>

    html {
        scroll-behavior: smooth
    }
    #body_container {
        visibility: hidden;
    }
</style>
