<template>
    <header>
        <div id="nav_container" class="nav_container h-24 flex items-center justify-center relative max-w-7xl mx-auto" >
            <div class="flex">
                <Link :href="`/`" preserve-state class="flex">
                    <SpecialLogo v-once/>
                </Link>
            </div>
        </div>
    </header>
</template>

<script setup>

import SpecialLogo from '@/Components/SpecialLogo.vue';
import {Link, router, usePage} from '@inertiajs/vue3';

const page = usePage()
</script>
