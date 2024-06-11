<template>
    <header class="bg-white">
        <div id="nav_container" class="nav_container h-24 flex items-center items-center justify-center">
            <Link :href="`/`" preserve-state>
                <SpecialLogo v-once/>
            </Link>
            <div class="container mx-auto px-4 h-full z-[99]">
            </div>
        </div>
    </header>
</template>

<script setup>
import SpecialLogo from '@/Components/SpecialLogo.vue';
import {Link, usePage} from '@inertiajs/vue3';

const page = usePage()

</script>
