<template>
    <Field>
        <div class="relative">
            <Label :name="name" :label="label" class="absolute -top-3 left-2 inline-block bg-slate-900 px-1 text-white
                text-md font-weight-bolder z-10"/>
            <input
                class="block w-full rounded-md border-0 py-3 bg-slate-900 text-md font-weight-bolder shadow-sm ring-1
                    ring-inset ring-slate-400 placeholder:text-slate-900 focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6
                    disabled:opacity-50 disabled:cursor-not-allowed"
                :name="name"
                :id="name"
                :type="type"
                :required="required"
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :step="type === 'datetime-local' ? '1' : undefined"
                :disabled="disabled"
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
    },
    label : {
        type: String,
        default: null,
    },
    disabled : {
        type: Boolean,
        default: false,
    }
});

const message = ref('');
</script>
