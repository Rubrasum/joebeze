<template>
    <div v-if="items.length > 0">
        <div>
            <FeaturedCard :post="items[0]" />
        </div>
        <div v-for="(post, index) in items.slice(1)" :key="post.id">
            <Card :post="post" />
        </div>

        <Link :href="props.posts.next_page_url" preserve-state preserve-scroll>Load More</Link>
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
import { Link } from '@inertiajs/vue3';
import {ref, watch} from 'vue';

// This is an example of infinite scrolling and how to add data without refreshing the page, or resetting the whole obj

// Props
const props = defineProps({
    posts: {
        type: Object,
        required: true
    }
});

const items = ref(props.posts.data)

watch(() => props.posts, (posts) => {
    items.value = [...items.value, ...posts.data]
})

</script>
