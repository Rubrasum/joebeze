<template>
    <div class="flex flex-col min-h-screen bg-gray-800">

        <AdminNav v-once/>
        <MainContain class="my-6">
            <div class="p-8 min-w-4xl max-w-screen-xl w-4/5 mx-auto bg-gray-900 text-white flex-grow overflow-hidden sm:rounded-lg sm:shadow">
                <div class="-ml-4 -mt-4">
                    <Link :href="'/admin/posts'">
                        <h1 class="text-2xl font-bold mb-8 pb-2 border-b border-gray-200 ">
                            {{ title }}
                        </h1>
                    </Link>
                    <div class="flex">
                        <aside class="w-48 flex-shrink-0">
                            <h4 class="font-semibold mb-4 text-white">Options</h4>
                            <ul>
                                <Link :href="'/admin/posts'"
                                      class="text-white border-white bg-gray-700 hover:text-white hover:border-white inline-block mb-2 mr-4 rounded-lg border-2"
                                >
                                    <li class="px-4 py-2">All Posts</li>
                                </Link>
                            </ul>
                        </aside>
                        <div class="flex-1 overflow-hidden">
                            <div v-if="$page.props.messages" class="fixed bottom-0 m-auto w-auto z-50">
                                <FlashMessage/>
                            </div>
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        </MainContain>

        <Footer />
    </div>
</template>

<script setup>
// Importing necessary functions and components from Vue and Inertia.js
import {Link, router, usePage} from '@inertiajs/vue3';
import MainContain from '@/Components/Layout/MainContain.vue';
import Footer from '@/Components/Layout/Footer.vue';
import AdminNav from '@/Components/Layout/AdminNav.vue';
import {ref, useSlots} from "vue";
import FlashMessage from "@/Components/Layout/FlashMessage.vue";


window.onload = function() {
    // change body element to visible after everything loaded. This is to prevent the flicker effect
    document.body.style.visibility = 'visible';
}

const slot = useSlots();
const title = ref(slot.title ? slot.title()[0].children : 'Admin Dashboard');



</script>


<style>


html {
    scroll-behavior: smooth
}
/* TODO: Reapply the flicker avoiding this body -> visibility hidden */
</style>
