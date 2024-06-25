<template>
    <Head title="Manage Posts" />
    <main class="flex-1 mx-2">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <form @submit.prevent="submit">
                            <div class="flex justify-end">
                                <Link :href="`/admin/posts/${post.id}/edit`"
                                      :class="`relative inline-flex items-center rounded-l-md rounded-r-md bg-white px-3 py-2 text-sm
                                                font-semibold text-gray-900 ring-1 ring-inset ring-gray-300
                                                hover:bg-gray-50 focus:z-10`"

                                >Edit</Link>
                            </div>
                            <!--                            https://inertiajs.com/forms-->
                            <TitleInput name="title" :label="'Post Title'" v-model="form.title" required
                                        :disabled="true"/>

                            <Input name="slug" :label="'Post Slug'" v-model="form.slug" required
                                   :disabled="true"/>

                            <Select name="category_id" :label="'Category'" v-model="form.category_id"
                                    :options="page.props.categories.map(category => ({ key: category.slug, value: category.id }))"
                                    required
                                    :disabled="true"/>

                            <Input name="published_at" type="datetime-local" required class="datepicker" v-model="form.published_at"
                                   :disabled="true"/>

                            <QuillArea name="excerpt" :label="'Post Excerpt'" :height="'h-48'" required v-model="form.excerpt"
                                       :disabled="true"></QuillArea>
                            <QuillArea name="body" :label="'Post Body'" :height="'h-96'" required v-model="form.body"
                                       :disabled="true"></QuillArea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>


<script setup>
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import {computed} from "vue";
import Input from "@/Components/Forms/Input.vue";
import TitleInput from "@/Components/Forms/TitleInput.vue";
import Button from "@/Components/Forms/Button.vue";
import Select from "@/Components/Forms/Select.vue";
import QuillArea from "@/Components/Forms/QuillArea.vue";

defineOptions({
    layout: AdminLayout,
})
const props = defineProps({
    post: {
        type: Object,
        required: true,
    }
});
const page = usePage();


if (page.props.messages === undefined) {
    page.props.messages = [];
}

const post = computed(() => page.props.post)

const form = useForm({
    title: props.post.title,
    slug: props.post.slug,
    excerpt: props.post.excerpt,
    body: props.post.body,
    category_id: props.post.category_id,
    published_at: formatDate(props.post.published_at) || '',
});

// disable the entire form and all the fields
form.disabled = true;


function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0'); // January is 0! Js is bad!
    const day = String(date.getDate()).padStart(2, '0');
    const hours = String(date.getHours()).padStart(2, '0');
    const minutes = String(date.getMinutes()).padStart(2, '0');
    const seconds = String(date.getSeconds()).padStart(2, '0');
    return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
}
</script>
