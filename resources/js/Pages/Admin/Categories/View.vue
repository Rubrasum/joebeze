<template>
    <Head title="Viewing Category" />
    <main class="flex-1 mx-2">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <form @submit.prevent="submit">
                            <div class="flex justify-between">
                                <div>
                                    <h1 class="items-center rounded-md bg-slate-700 px-3 py-2 text-sm font-semibold text-white shadow-sm">
                                        Editing Category: {{ category.id }}
                                    </h1>
                                </div>
                                <div>
                                    <Link :href="`/admin/categories/${category.id}/edit`"
                                          :class="`relative inline-flex items-center rounded-md bg-slate-700 px-3 py-2
                                          text-sm font-semibold text-white shadow-sm hover:bg-slate-600
                                          focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                          focus-visible:outline-slate-600 border border-white mr-2`"
                                    >Edit</Link>
                                    <Link :href="`/category/${category.slug}`"
                                          :class="`relative inline-flex items-center rounded-md bg-slate-700 px-3 py-2
                                          text-sm font-semibold text-white shadow-sm hover:bg-slate-600
                                          focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                          focus-visible:outline-slate-600 border border-white`"

                                    >Preview</Link>
                                </div>
                            </div>
                            <!--                            https://inertiajs.com/forms-->
                            <TitleInput name="name" :label="'Category Name'" v-model="form.name" required
                                        :disabled="true"/>

                            <Input name="slug" :label="'Category Slug'" v-model="form.slug" required
                                   :disabled="true"/>

                            <Input name="color" :label="'Category Color'" v-model="form.color" required
                                   :disabled="true"/>
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
    category: {
        type: Object,
        required: true,
    }
});
const page = usePage();


if (page.props.messages === undefined) {
    page.props.messages = [];
}

const category = computed(() => page.props.category)

const form = useForm({
    name: props.category.name,
    slug: props.category.slug,
    color: props.category.color
});

// disable the entire form and all the fields
form.disabled = true;
</script>
