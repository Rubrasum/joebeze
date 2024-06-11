<script setup>
// Importing necessary functions and components from Vue and Inertia.js
import { Link, router } from '@inertiajs/vue3';
import MainContain from '@/Components/Layout/MainContain.vue';
import Footer from '@/Components/Layout/Footer.vue';
import AdminNav from '@/Components/Layout/AdminNav.vue';


window.onload = function() {
    // change body element to visible after everything loaded. This is to prevent the flicker effect
    document.body.style.visibility = 'visible';
}

</script>

<template>
    <div class="flex flex-col min-h-screen">

        <AdminNav v-once/>
        <MainContain class="bg-gray-800">
            <div :class="`p-8 min-w-4xl max-w-screen-lg w-4/5 mx-auto bg-gray-900 text-white flex-grow`">
                <slot></slot>
            </div>
        </MainContain>

        <Footer />
    </div>
</template>

<style>


html {
    scroll-behavior: smooth
}
body {
    visibility: hidden;
}
</style>
