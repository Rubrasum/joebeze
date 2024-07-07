<template>
    <Head :title="post.title" />
    <div v-if="post !== null">
        <main class="bg-black mt-4">
            <article id="post-article"
                     class="container mx-auto px-16 pb-16 pt-8 my-8 border-x border-secondary-bg
                     min-w-48 w-3/4 max-w-screen-lg">
                <div class="col-span-3">
                    <h1 class="text-white text-4xl font-bold mb-10">{{ post.title }}</h1>
                </div>

                <div class="col-span-2 border-dashed border-y border-secondary-bg text-center flex justify-center items-center space-x-4">
                    <h6 class="my-2 text-white">
                        Published {{ formatDate(post.published_at) }}
                    </h6>
                    <Link :href="`/?category=${post.category.slug}`"
                       :class="`px-3 py-1 border border-${post.category.color} rounded-full text-${post.category.color} text-xs uppercase font-semibold`"
                    >{{ post.category.name }}</Link>
                    <div v-if="$page.props.auth.user">
                        <Link :href="`/admin/posts/${post.id}/edit`">Edit</Link>
                    </div>
                </div>


                <div class="text-white space-y-4 lg:text-lg leading-loose pt-10" v-html="post.body"></div>
            </article>
        </main>
    </div>
</template>


<script setup>
import { Head, Link } from '@inertiajs/vue3';
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

