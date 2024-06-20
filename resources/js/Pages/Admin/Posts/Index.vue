<template>
    <Head title="Manage Posts" />
    <main class="flex-1 w-full">
        <div class="flex flex-col  w-full">
            <div class="-my-2 overflow-x-auto w-full">
                <div class="py-2 align-middle inline-block sm:px-2 lg:px-4 w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                        <table class="min-w-full divide-y divide-gray-200" >
                            <thead class="bg-gray-50 w-full">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="sr-only">Edit</span>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span class="sr-only">Delete</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 w-full">
                            <tr v-for="post in posts.data" :key="post.id">
                                <td class="px-6 py-4 ">
                                    <div class="text-sm text-gray-900">{{ post.id }}</div>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-slate-900 hover:font-bold">
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
                                    <form method="DELETE" :action="`/admin/posts/${post.id}`">
                                        <button class="text-xs text-gray-400">Delete</button>
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
import { Head, Link, usePage } from '@inertiajs/vue3';
import {computed} from "vue";
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Pagination from "@/Components/Pagination/Main.vue";
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

const posts = computed(() => page.props.posts)
</script>
