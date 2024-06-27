<template>
    <Head title="Create Category" />
    <main class="flex-1 mx-2">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden sm:rounded-lg">
                        <form @submit.prevent="submit">
                            <!--                            https://inertiajs.com/forms-->
                            <TitleInput name="name" :label="'Category Title'" v-model="form.name" required />

                            <Input name="slug" :label="'Category Slug'" v-model="form.slug" required />

                            <Input name="color" :label="'Category color (hex string)'" v-model="form.color" required />

                            <Button>Create new Category</Button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>


<script setup>
import {Head, Link, router, useForm, usePage} from '@inertiajs/vue3';
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

});
const page = usePage();


if (page.props.messages === undefined) {
    page.props.messages = [];
}

const form = useForm({
    name: "",
    slug: "",
    color: "",
});

function submit() {
    // add messages to session

    form.post(`/admin/categories`, {
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
                message: 'Category "' + form.name + '" created successfully!',
                duration: 5,
                type: "success"
            });
            router.get(`/admin/categories/${page.props.category.id}`);
        },
    });
}

</script>
