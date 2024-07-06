<template>
    <div class="top-0 left-0 w-full bg-primary-bg bg-opacity-60 flex  justify-end ">
        <div class="flex flex-col mb-12">
            <div class="lg:grid lg:grid-cols-5 lg:gap-5 pb-8 px-8
                 inset-0 border-l border-secondary-bg">
                <div class="lg:col-span-2 p-2">
                    <img :src="`/images/category-logos/${post.category.name}-cat-logo.jpg`" alt="Image"
                         class="w-full h-auto bg-secondary-bg text-primary-text">
                </div>
                <div class="lg:col-span-3">
                    <Link :href="`/post/${post.slug}`" preserve-state >
                        <h2 class="text-primary-text text-3xl md:text-4xl">{{ post.title }}</h2>
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
                        <h3 class="text-primary-text pt-2 text-base">Published: {{ formattedDate }}</h3>
                        <footer>
                            <Link :href="`/post/${post.slug}`"  :only="['post']"
                                  class="bg-primary-gray hover:bg-accent text-primary-text font-bold py-2 px-4 rounded btn-read-gray"
                                  preserve-state
                            >Read more</Link>
                        </footer>
                    </div>
                    <div class="lg:col-span-5 border-accent mt-8 text-primary-text text-sm xl:text-base">
                        <p class="mb-4 text-justify text-primary-text" v-html="post.excerpt"></p>
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
