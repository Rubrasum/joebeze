<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import HeroSection from '@/Components/Layout/HeroSection.vue';
import SimpleBlurb from '@/Components/Layout/SimpleBlurb.vue';
import GraphicsBlurb from '@/Components/Layout/GraphicsBlurb.vue';
import GraphicsBlurb2 from '@/Components/Layout/GraphicsBlurb2.vue';
import ClientReviews from '@/Components/Layout/ClientReviews.vue';
import ContactForm from '@/Components/Layout/ContactForm.vue';
import ApplicationMark from '@/Components/Default/ApplicationMark.vue';
import Head from '@/Components/Layout/Head.vue';
</script>

<template>
    <HomeLayout >
        <!-- Simple Blurb -->
        <SimpleBlurb />

        <!-- Section with some Graphic Elements -->
        <GraphicsBlurb />
        <GraphicsBlurb2 />

        <!-- Client Reviews -->
        <ClientReviews />

        <!-- Contact Form -->
        <ContactForm />

        <!-- Footer -->
    </HomeLayout>
</template>
