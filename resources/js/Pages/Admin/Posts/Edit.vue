<template>
    <Head title="Manage Posts" />
    <main class="flex-1">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <form @submit.prevent="form.patch(`/admin/posts/${post.id}`)" enctype="multipart/form-data">
<!--                            https://inertiajs.com/forms-->
                            <TitleInput name="title" :label="'Post Title'" v-model="form.title" required />

                            <Input name="slug" :label="'Post Slug'" v-model="form.slug" required />

                            <Select name="category_id" :label="'Category'" v-model="form.category_id"
                                    :options="page.props.categories.map(category => ({ key: category.slug, value: category.id }))"
                                    required/>

                            <Input name="published_at" type="date" required class="datepicker" v-model="form.published_at" />

                            <Textarea name="excerpt" :label="'Post Excerpt'" :height="'h-48'" required v-model="form.excerpt"></Textarea>
                            <Textarea name="body" :label="'Post Body'" :height="'h-96'" required v-model="form.body"></Textarea>

                            <Button>Update</Button>
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
import Textarea from "@/Components/Forms/Textarea.vue";
import Field from "@/Components/Forms/Field.vue";
import Label from "@/Components/Forms/Label.vue";
import Error from "@/Components/Forms/Error.vue";
import Button from "@/Components/Forms/Button.vue";
import Select from "@/Components/Forms/Select.vue";

defineOptions({
    layout: AdminLayout,
})
const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
    categories : {
        type: Array,
        required: true,
    }
});
const page = usePage();

const form = useForm({
    title: props.post.title,
    slug: props.post.slug,
    excerpt: props.post.excerpt,
    body: props.post.body,
    category_id: props.post.category_id,
    published_at: formatDate(props.post.published_at) || '',
});



function formatDate(dateString) {
    const date = new Date(dateString);
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

const post = computed(() => page.props.post)
</script>
