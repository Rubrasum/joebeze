<template>
    <Head title="Manage Categories" />
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
                                    <Link :href="`/admin/categories/${category.id}`"
                                          :class="`relative inline-flex items-center rounded-md bg-slate-700 px-3 py-2
                                          text-sm font-semibold text-white shadow-sm hover:bg-slate-600
                                          focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                          focus-visible:outline-slate-600 border border-white mr-2`"
                                    >Cancel Edit</Link>
                                    <Link :href="`/category/${category.slug}`"
                                          :class="`relative inline-flex items-center rounded-md bg-slate-700 px-3 py-2
                                          text-sm font-semibold text-white shadow-sm hover:bg-slate-600
                                          focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                          focus-visible:outline-slate-600 border border-white`"

                                    >Preview</Link>
                                </div>
                            </div>
                            <!--                            https://inertiajs.com/forms-->
                            <TitleInput name="name" :label="'Category Name'" v-model="form.name" required />

                            <Input name="slug" :label="'Category Slug'" v-model="form.slug" required />

                            <Input name="color" :label="'Category Color'" v-model="form.color" required />

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
    },
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

function submit() {
    // add messages to session

    form.patch(`/admin/categories/${props.category.id}`, {
        only: ['category'],
        onError: (errors) => {
            // Log the detailed error object to the console for debugging
            console.error('Error Details:', errors);

            // Construct a detailed error message if the errors object contains specific error messages
            let detailedErrorMessage = 'There was an error updating the category "' + page.props.category.name + '".';
            if (errors && typeof errors === 'object' && Object.keys(errors).length > 0) {
                // Append each error message to the detailed error message
                Object.keys(errors).forEach((key) => {
                    detailedErrorMessage += ` ${key}: ${errors[key]}`;
                });
            }

            // Display the detailed error message in the UI
            page.props.messages.push({
                message: detailedErrorMessage,
                duration: 10,
                type: "error"
            });
        },
        onSuccess: () => {
            page.props.messages.push({
                message: 'Category "' + page.props.category.title + '" updated successfully!',
                duration: 5,
                type: "success"
            });
        },
    });
}

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
