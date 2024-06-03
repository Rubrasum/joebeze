<template>
    <title></title>
    <!-- Fonts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</template>

<script setup>

// hide the page body_container id element until its loaded
window.onload = function() {
    document.getElementById('body_container').style.visibility = 'visible';
}
</script>

<style scoped>
html {
    scroll-behavior: smooth
}
#body_container {
    visibility: hidden;
}

</style>
