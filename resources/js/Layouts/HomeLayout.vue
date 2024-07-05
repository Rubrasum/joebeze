<template>
    <div class="flex flex-col min-h-screen">
<!--        <Banner />-->

        <!-- Holds most of the page content and in a particular layout -->
        <!-- If everything is in this container, that represents the simplicity of the design -->
        <!-- more complicated designs might have slightly more complicated container layouts.
        Maybe nav and banner are both without containers. Who the fuck nose. So a full design will include unqiue -->
        <!-- Primary Navigation Menu -->
        <HeaderContainer >
            <LogoBanner v-once/>
            <PrimaryNav />
        </HeaderContainer>

        <MainContain>

            <!-- Secondary Navigation Menu -->
            <!--            <ResponsiveNav />-->

            <!-- page -->
            <slot></slot>
        </MainContain>

        <Footer />
    </div>
</template>
<script setup>
// Importing necessary functions and components from Vue and Inertia.js
import { Link, router } from '@inertiajs/vue3';
import MainContain from '@/Components/Layout/MainContain.vue';
import Footer from '@/Components/Layout/Footer.vue';
import LogoBanner from '@/Components/Layout/LogoBanner.vue';
import PrimaryNav from '@/Components/Layout/PrimaryNav.vue';
import HeaderContainer from '@/Components/Layout/HeaderContainer.vue'
import {onMounted} from "vue";


// SAMPLE CODE FOR PAGE //////////////////////////////////////////////////////////////////////////////////////////////
// hide the page body_container id element until its loaded
onMounted(() => {
    document.body.style.visibility = 'visible';
});

</script>


<style>


html {
    scroll-behavior: smooth
}
body {
    visibility: hidden;
}
</style>
