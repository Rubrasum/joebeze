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
                            <Input name="title" :v-model="form.title" required/>

                            <Input name="slug" :v-model="form.slug" required />

                            <Textarea name="excerpt" :height="48" required :v-model="form.excerpt"></Textarea>
                            <Textarea name="body" :height="96" required :v-model="form.body"></Textarea>

                            <Select name="category_id" :v-model="form.category_id"
                                    :options="page.props.categories.map(category => ({ key: category.slug, value: category.id }))"
                                    required/>

                            <Input name="published_at" type="date" required class="datepicker" :v-model="form.published_at" />

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
    title: '',
    slug: '',
    excerpt: '',
    body: '',
    category_id: '',
    published_at: '',
});



const post = computed(() => page.props.post)
</script>
