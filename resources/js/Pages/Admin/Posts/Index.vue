<template>

    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        Manage Posts
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4 text-white">Options</h4>

            <ul>
                <Link :href="'admin.posts'"
                   class="text-white border-white bg-gray-700 hover:text-white hover:border-white inline-block mb-2 mr-4 rounded-lg border-2"
                >
                    <li class="px-4 py-2">All Posts</li>
                </Link>
            </ul>
        </aside>

        <main class="flex-1">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="post in posts" :key="post.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <Link href="/post/{{ post.slug }}">
                                                    {{ post.title }}
                                                </Link>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <Link href="/admin/posts/{{ post.id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</Link>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="DELETE" action="/admin/posts/{{ post.id }}">
                                            @csrf

                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import {computed} from "vue";
defineOptions({
    layout: AdminLayout,
})
const page = usePage();

defineProps({
    posts: {
        type: Object,
        required: true
    }
})

const posts = computed(() => page.props.posts.data)
</script>
