<template>
    <Field>
        <Label :name="name" :label="label" :class="['absolute -top-3 left-2 inline-block bg-slate-900 px-1 text-white text-md font-weight-bolder']"/>
        <textarea
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
import {computed, onMounted, ref} from "vue";

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
    },
    label : {
        type: String,
        default: null,
    }
});

</script>
