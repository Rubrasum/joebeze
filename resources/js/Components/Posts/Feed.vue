<template>
    <div v-if="items.length > 0">
        <div>
            <FeaturedCard :post="items[0]" />
        </div>
        <div v-if="items.length >= 2">
            <div v-for="(post, index) in items.slice(1)" :key="post.id">
                <Card :post="post" />
            </div>
        </div>
        <div ref="landmark">    </div>
    </div>
    <div v-else>
        <div class="flex items-center flex-grow justify-center text-center ">
            <p class="text-2xl md:text-3xl lg:text-4xl text-secondary font-semibold py-14">
                Oops... No posts found.
            </p>
        </div>
    </div>
</template>

<script setup>
import FeaturedCard from './FeaturedCard.vue';
import Card from './Card.vue';
import {Link, router, usePage} from '@inertiajs/vue3';
import {computed, onMounted, ref, watch} from 'vue';

// This is an example of infinite scrolling and how to add data without refreshing the page, or resetting the whole obj
// TODO make this reusable (ep 4 infinite scrolling)

// Props
const page = usePage();
const items = computed(() => page.props.posts.data);
const initialUrl = page.url;
const nextPageUrl = computed(() => page.props.posts.next_page_url);
const posts = computed(() => page.props.posts);

const loadMoreItems = () => {
    if (!nextPageUrl.value) {
        return;
    }

    router.get(props.posts.next_page_url, {}, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (page) => {
            window.history.replaceState({}, '', initialUrl);
            items.value = [...items.value, ...page.props.posts.data];
        }
    });
}
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            loadMoreItems();
        }
    });
});

const landmark = ref(null);

if (items.length > 1) {
    onMounted(() => {
        observer.observe(landmark.value);
    });
}

</script>
