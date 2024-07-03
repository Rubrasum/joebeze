<template>
    <div class="bg-background">
        <div class="w-full relative">
            <div class="top-0 left-0 w-full bg-background bg-opacity-60 flex flex-col justify-between border-t-8 border-primary">
                <div class="mb-8 mx-[10vw] pt-8 lg:pt-16 px-4 xl:px-16 pb-8 lg:grid lg:grid-cols-5 lg:gap-5 border-l-8
                            border-r-2 border-b-2 border-primary rounded-br-md">
                    <div class="lg:col-span-2 border-primary">
                        <img :src="`/images/category-logos/${post.category.name}-cat-logo.jpg`" alt="Image"
                             class="w-full h-auto border-2 border-primary">
                    </div>
                    <div class="lg:col-span-3">
                        <Link :href="`/post/${post.slug}`" preserve-state >
                            <h2 class="text-secondary text-3xl md:text-4xl">{{ post.title }}</h2>
                        </Link>
                        <div class="mt-4 space-x-2">
                            <Link  :href="`/?category=${post.category.slug}`" preserve-state
                                   :class="`px-3 py-1 border-2 border-${post.category.color} rounded-full
                                   text-${post.category.color} text-sm uppercase`"

                            >
                                {{ post.category.name }}
                            </Link>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <h3 class="text-white pt-2">Published: {{ formattedDate }}</h3>
                            <footer>
                                <Link :href="`/post/${post.slug}`"  :only="['post']"
                                      class="bg-accent-dark hover:bg-accent text-secondary font-bold py-2 px-4 rounded btn-read-gray"
                                      preserve-state
                                >Read more</Link>
                            </footer>
                        </div>
                        <div class="lg:col-span-5 border-primary mt-8 text-secondary text-sm xl:text-base">
                            <p class="mb-4 text-justify text-secondary" v-html="post.excerpt"></p>
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
