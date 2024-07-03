<template>
    <div class="bg-primary-bg">
        <div class="w-full relative">
            <div class="top-0 left-0 w-full bg-primary-bg bg-opacity-60 flex flex-col justify-between">
                <div class="mb-8 px-4 py-5 mb-12 md:grid items-center md:grid-cols-10 md:gap-5
                            border-b-2 border-secondary-bg rounded-br-md">
                    <div class="md:col-span-2 h-full">
                        <img :src="`/images/category-logos/${post.category.name}-cat-logo.jpg`" alt="Image" class="w-full h-auto border-2 border-primary">
                    </div>
                    <div class="md:col-span-8 md:flex">
                        <div class="md:w-2/5 pr-3 items-center md:items-start md:flex-row md:items-baseline md:space-x-3">
                            <Link :href="`/post/${post.slug}`" preserve-state :only="['post']">
                                <h2 class="text-primary-text text-2xl">{{ post.title }}</h2>
                            </Link>
                            <h3 class="text-primary-text my-2">Published: {{ formattedDate }}</h3>
                        </div>
                        <div class="md:w-3/5 text-primary-text">
                            <div class="mb-4 text-justify text-sm xl:text-base" v-html="post.excerpt"></div>
                            <div class="flex justify-between items-center">
                                <div class="space-x-2">
                                    <Link :href="`/?category=${post.category.slug}`" preserve-state
                                          :class="`px-3 py-1 border border-${post.category.color} rounded-full
                                          text-${post.category.color} text-xs uppercase font-semibold`"
                                    >
                                        {{ post.category.name }}
                                    </Link>
                                </div>
                                <div>
                                    <Link :href="`/post/${post.slug}`"  preserve-state :only="['post']"
                                       class="bg-primary-gray hover:bg-accent text-primary-text py-2 px-4
                                       rounded btn-read-gray"
                                    >
                                        Read more
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1 text-primary-text flex items-end justify-center h-full">
                        <!-- Additional content if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue';
import { format } from 'date-fns'; // Assuming you're using date-fns for date formatting
import {Link, usePage} from '@inertiajs/vue3';

// Define the props
const props = defineProps({
    post: {
        type: Object,
        required: true
    }
});

const page = usePage();
const post = ref(props.post);
// Computed property for formatted date
const formattedDate = computed(() => format(new Date(props.post.published_at), 'MMMM dd, yyyy'));
</script>
