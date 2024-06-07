<template>
    <div v-if="posts.length > 0">
        <div>
            <FeaturedCard :post="posts[0]" />
        </div>
        <div v-for="(post, index) in posts.slice(1)" :key="post.id">
            <Card :post="post" />
        </div>
    </div>
    <div v-else>
        <div class="flex items-center flex-grow justify-center text-center ">
            <p class="text-2xl md:text-3xl lg:text-4xl text-white font-semibold py-14">
                Oops... No posts found.
            </p>
        </div>
    </div>
</template>

<script setup>
import FeaturedCard from './FeaturedCard.vue';
import Card from './Card.vue';

// Props
const props = defineProps({
    posts: {
        type: Array,
        required: true
    }
});

</script>
