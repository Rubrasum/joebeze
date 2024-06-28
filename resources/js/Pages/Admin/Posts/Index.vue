<template>
    <Head title="Manage Posts" />
    <main class="flex-1 w-full">
        <div class="flex flex-col  w-full">
            <div class="-my-2 overflow-x-auto w-full">
                <div class="py-2 align-middle inline-block sm:px-2 lg:px-4 w-full">
                    <div class="bg-slate-900 mb-2 px-2 py-2 sm:px-6">
                        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h2>All Posts</h2>
                            </div>
                            <div class="ml-4 mt-2 flex-shrink-0">
                                <Link class="relative inline-flex items-center rounded-md bg-slate-700 px-3 py-2
                                      text-sm font-semibold text-white shadow-sm hover:bg-slate-600
                                      focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                      focus-visible:outline-slate-600 border border-white"
                                      :href="`/admin/posts/create/`"
                                >Create new post</Link>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden shadow border border-white sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200" >
                            <thead>
                            <tr>
                                <th scope="col">
                                    Id
                                </th>
                                <th scope="col" class="border-0">
                                    Title
                                </th>
                                <th scope="col" class="border-0">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="border-0">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-slate-900 divide-y divide-gray-200 w-full">
                            <tr v-for="post in posts.data" :key="post.id">
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-white">{{ post.id }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium">
                                            <Link :href="`/post/${post.slug}`">
                                                {{ post.title }}
                                            </Link>
                                        </div>
                                    </div>
                                </td>


                                <td class="px-6 py-4  text-right text-sm font-medium">
                                    <Link :href="`/admin/posts/${post.id}/edit`" class="text-blue-500 hover:text-blue-600">Edit</Link>
                                </td>

                                <td class="px-6 py-4  text-right text-sm font-medium">
                                    <form @submit.prevent="deletePost(post.id)" >
                                        <button class="text-xs text-gray-400" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <Pagination :items="posts"/>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import {Head, Link, router, usePage} from '@inertiajs/vue3';
import {computed} from "vue";
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Pagination from "@/Components/Pagination/Main.vue";
defineOptions({
    layout: AdminLayout,
})
const page = usePage();
if (!page.props.messages) {
    page.props.messages = []
}

defineProps({
    posts: {
        type: Object,
        required: true
    }
})

const posts = computed(() => page.props.posts)

function deletePost(postId) {
    if (confirm('Are you sure you want to delete this post?')) {
        router.delete("/admin/posts/"+postId, {
            only: ['posts'],
            onSuccess: () => {
                page.props.messages.push({
                    message: 'Post "' + postId + '" deleted successfully!',
                    duration: 5,
                    type: "success"
                });
            },
        });
    }
}
</script>
