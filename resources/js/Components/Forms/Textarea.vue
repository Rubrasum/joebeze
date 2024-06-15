<template>
    <Field>
        <Label :name="name"/>
        <textarea
            :class="['border border-gray-800 bg-gray-900 text-white p-2 w-full rounded-md h-' + height + ' resize-none']"
            :name="name"
            :id="name"
            :required="required"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        >
        </textarea>
        <Error :name="name" />
    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import Input from "@/Components/Forms/Input.vue";

const page = usePage();

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    required: {
        type: Boolean,
        default: false,
    },
    height: {
        type: String,
        default: '48',
    },
    placeholder: {
        type: String,
        default: '',
    },
    modelValue : {
        type: String,
        default: '',
    }
});
</script>
