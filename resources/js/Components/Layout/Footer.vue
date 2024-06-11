<template>
    <footer class="bg-gray-900 text-gray-500">
        <div class="container mx-auto max-w-screen-lg py-4 lg:py-12 flex flex-col
                md:flex-row md:items-start justify-between">
            <About />
            <Contact />
            <Social />
<!--            <Newsletter /> TODO Not Yet implemented, or even designed for.  -->
        </div>
        <Copyright />

    </footer>

</template>

<script setup>
import About from './Footer/About.vue';
import Contact from './Footer/Contact.vue';
import Social from './Footer/Social.vue';
import Copyright from './Footer/Copyright.vue';

</script>
