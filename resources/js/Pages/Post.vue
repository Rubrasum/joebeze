<template>
    <Head :title="post.title" />
    <div v-if="post !== null">
        <main class="bg-black mt-2">
            <article id="post-article" class="container mx-auto p-16 mb-8 border-l-8 border-r-2 border-b-2 border-gray-900 rounded-br-md min-w-48 w-3/4 max-w-screen-lg">
                <div class="col-span-3">
                    <Link :href="`/home`" preserve-state >
                        <h1 class="text-white text-4xl font-bold mb-10">{{ post.title }}</h1>
                    </Link>
                </div>

                <div class="col-span-2 border-t-2 border-b-2 border-gray-900 text-center flex justify-center items-center space-x-4">
                    <p class="my-2 text-white">
                        Published
                        <span class="font-semibold">{{ formatDate(post.published_at) }}</span>
                    </p>
                    <Link :href="`/?category=${post.category.slug}`"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold btn-color-cat"
                    >{{ post.category.name }}</Link>
                    <div v-if="$page.props.auth.user">
                        <Link :href="`/admin/posts/${post.id}/edit`">Edit</Link>
                    </div>
                </div>


                <div class="text-white space-y-4 lg:text-lg leading-loose pt-10">{{ post.body }}</div>
            </article>
        </main>
    </div>
</template>


<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';

defineProps({
    post: {
        type: Object,
        required: true
    }
});
defineOptions({ layout: HomeLayout })
// Function to format date
const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}
</script>

