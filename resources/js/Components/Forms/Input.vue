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
            v-model="inputValue"
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
});

const message = ref('');

// Create a computed property to dynamically bind the input value
const inputValue = computed({
    get() {
        return page.props.value.form[props.name];
    },
    set(value) {
        page.props.value.form[props.name] = value;
    }
});
</script>
