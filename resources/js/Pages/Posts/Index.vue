<template>
    <div>
<!--        if there are posts, show feed-->
        <div v-if="posts.length">
            <div v-for="post in posts" :key="post.id">
                <Feed />
            </div>
        </div>
<!--        if not, show the div-->
        <div v-else>
            <div class="flex items-center flex-grow justify-center text-center ">
                <p class="text-2xl md:text-3xl lg:text-4xl text-white font-semibold py-4">
                    Oops... No posts found.
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

// Props
const props = defineProps({
    posts: {
        type: Array,
        required: true
    }
});
</script>
