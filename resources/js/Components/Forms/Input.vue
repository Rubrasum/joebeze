<template>
    <Field>
        <div class="relative">
            <Label :name="name" class="absolute -top-2 left-2 inline-block bg-slate-900 px-1 text-white text-xs font-medium"/>
            <input
                class="block w-full rounded-md border-0 py-1.5 bg-slate-900 text-white shadow-sm ring-1 ring-inset ring-white placeholder:text-slate-900 focus:ring-2 focus:ring-inset focus:ring-grey-300 sm:leading-6"
                :name="name"
                :id="name"
                :type="type"
                :required="required"
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            />
        </div>
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
