<template>
    <Field>
        <Label :name="name"/>
        <input
            :class="['border border-gray-800 bg-gray-900 text-white p-2 w-full rounded']"
            :name="name"
            :id="name"
            :type="type"
            :required="required"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        />
        <Error :name="name" />

    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";

const page = usePage();

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    required: {
        type: Boolean,
        default: false,
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

const message = ref('');
</script>
