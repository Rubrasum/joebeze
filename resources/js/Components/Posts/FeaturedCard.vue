<template>
    <div class="bg-black">
        <div class="w-full relative">
            <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between border-t-8 border-gray-800">
                <div class="mb-8 mx-[10vw] pt-8 lg:pt-16 px-4 xl:px-16 pb-8 lg:grid lg:grid-cols-5 lg:gap-5 border-l-8 border-r-2 border-b-2 border-gray-800 rounded-br-md">
                    <div class="lg:col-span-2 border-gray-800">
                        <img :src="`/images/category-logos/${post.category.name}-cat-logo.jpg`" alt="Image" class="w-full h-auto border-2 border-gray-800">
                    </div>
                    <div class="lg:col-span-3">
                        <Link :href="`/post/${post.slug}`" preserve-state >
                            <h1 class="text-white text-3xl md:text-4xl font-bold">{{ post.title }}</h1>
                        </Link>
                        <div class="mt-4 space-x-2">
                            <Link  :href="`/?category=${post.category.slug}`" preserve-state
                                   :class="`px-3 py-1 border-2 border-${post.category.color} rounded-full
                                   text-${post.category.color} text-sm uppercase font-semibold`"

                            >
                                {{ post.category.name }}
                            </Link>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <p class="text-white pt-2">Published: <span class="font-semibold">{{ formattedDate }}</span></p>
                            <footer>
                                <Link :href="`/post/${post.slug}`"  :only="['post']"
                                      class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded btn-read-gray"
                                      preserve-state
                                >Read more</Link>
                            </footer>
                        </div>
                        <div class="lg:col-span-5 border-gray-800 mt-8 text-white text-sm xl:text-base">
                            <p class="mb-4 text-justify text-white" v-html="post.excerpt"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import {computed} from "vue";
import {format} from "date-fns";

// Define the props
const props = defineProps({
    post: {
        type: Object,
        required: true
    }
});
const formattedDate = computed(() => format(new Date(props.post.published_at), 'MMMM dd, yyyy'));
</script>
