<template>
    <div class="bg-black">
        <div class="w-full relative">
            <div class="top-0 left-0 w-full bg-black bg-opacity-60 flex flex-col justify-between">
                <div class="mb-8 mx-[10vw] px-4 py-5 mb-12 md:grid items-center md:grid-cols-10 md:gap-5 border-l-8 border-r-2 border-b-4 border-t-8 border-gray-800 rounded-br-md">
                    <div class="md:col-span-2 h-full">
                        <img :src="`/images/category-logos/${post.category.name}-cat-logo.jpg`" alt="Image" class="w-full h-auto border-2 border-gray-800">
                    </div>
                    <div class="md:col-span-8 md:flex">
                        <div class="md:w-2/5 pr-3 items-center md:items-start md:flex-row md:items-baseline md:space-x-3">
                            <a :href="`/post/${post.slug}`">
                                <h2 class="text-white text-2xl font-bold">{{ post.title }}</h2>
                            </a>
                            <p class="text-white my-2">Published: <span class="font-semibold">{{ formattedDate }}</span></p>
                        </div>
                        <div class="md:w-3/5 text-white">
                            <div class="mb-4 text-justify text-sm xl:text-base" v-html="post.excerpt"></div>
                            <div class="flex justify-between items-center">
                                <div class="space-x-2">
                                    <a :href="`/?category=${post.category.slug}`" :class="`px-3 py-1 border border-${post.category.color} rounded-full text-${post.category.color} text-xs uppercase font-semibold btn-color-cat`">
                                        {{ post.category.name }}
                                    </a>
                                </div>
                                <div>
                                    <a :href="`/post/${post.slug}`" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded btn-read-gray">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 text-white flex items-end justify-center h-full">
                        <!-- Additional content if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { format } from 'date-fns'; // Assuming you're using date-fns for date formatting

// Define the props
const props = defineProps({
    post: {
        type: Object,
        required: true
    }
});

// Computed property for formatted date
const formattedDate = computed(() => format(new Date(props.post.published_at), 'MMMM dd, yyyy'));
</script>
