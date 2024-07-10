<template>
    <!-- Google tag (gtag.js), use env -->
    <script async :src="`https://www.googletagmanager.com/gtag/js?id=${googleAnalyticsId}`"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ googleAnalyticsId }}');
    </script>
</template>

<script setup>
import { ref } from 'vue'

const googleAnalyticsId = ref(import.meta.env.GOOGLE_AN)
</script>
