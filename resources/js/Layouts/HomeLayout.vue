<script setup>
// Importing necessary functions and components from Vue and Inertia.js
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import MainContain from '@/Components/Layout/MainContain.vue';
import Footer from '@/Components/Layout/Footer.vue';
import PrimaryNav from '@/Components/Layout/PrimaryNav.vue';


// SAMPLE CODE FOR PAGE //////////////////////////////////////////////////////////////////////////////////////////////
// Function to log out the user
const logout = () => {
    router.post(route('logout'));
};
// hide the page body_container id element until its loaded
window.onload = function() {
    // change body element to visible
    document.body.style.visibility = 'visible';
}

</script>

<template>
    <div class="flex flex-col min-h-screen">
<!--        <Banner />-->

        <!-- Holds most of the page content and in a particular layout -->
        <!-- If everything is in this container, that represents the simplicity of the design -->
        <!-- more complicated designs might have slightly more complicated container layouts.
        Maybe nav and banner are both without containers. Who the fuck nose. So a full design will include unqiue -->
        <!-- Primary Navigation Menu -->
        <PrimaryNav v-once/>
        <MainContain>

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
body {
    visibility: hidden;
}
</style>
