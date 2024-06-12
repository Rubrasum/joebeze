<template>
    <Head title="Manage Posts" />
    <main class="flex-1">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <form @submit.prevent="`/admin/posts/${post.id}`" enctype="multipart/form-data">
<!--                            https://inertiajs.com/forms-->
                            @csrf
                            @method('PATCH')
                            <Input :name="title" :value="post.title" :required="true" />

                            <Input :name="slug" :value="post.slug" :required="true" />

                            <Textarea :name="excerpt" :height="48" :required="true">{{ post.excerpt) }}</Textarea>
                            <Textarea :name="body" :height="96" :required="true">{{ post.body }}</Textarea>

                            <Field>
                                <Label :name="category"/>

                                <select name="category_id" id="category_id" required class="border border-gray-800 bg-gray-900 text-white p-2 rounded">
                                    <option v-for="category in page.props.categories" :value="category.id" :selected="category.id === post.category.id"
                                        class="bg-gray-900 text-white" value="{{ category.id }}">
                                        {{ category.name.replace(/\b\w/g, char => char.toUpperCase()) }}
                                    </option>
                                </select>

                                <Error name="category"/>
                            </Field>

                            <Input name="published_at" type="date" required class="datepicker" :value="$post->published_at->format('Y-m-d')" />

                            <Button>Update</Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>


<script setup>
import { Head, Link, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import {computed} from "vue";
defineOptions({
    layout: AdminLayout,
})
const page = usePage();


const post = computed(() => page.props.post)
</script>
