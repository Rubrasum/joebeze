<template>
    <Field>
        <Label :name="name"/>
        <select
            :name="name"
            :id="name"
            required
            class="border border-gray-800 bg-gray-900 text-white p-2 rounded"
            @change="$emit('update:selected', $event.target.value)"
        >
            <option
                :value="''"
                :selected="selected === ''"
            >{{ placeholder }}
            </option>
            <option
                v-for="option in options"
                :key="option.key"
                :value="option.value"
                :selected="option.value === selected"
            >
                {{ option.key }}
            </option>
        </select>
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
    selected : {
        type: String,
        default: '',
    },
    options : {
        type: Array,
        required: true,
    }
});

const message = ref('');
</script>
