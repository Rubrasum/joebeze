<template>
    <Field>
        <div class="relative">
            <Label :name="name" :label="label" class="
                absolute -top-3 left-2 inline-block bg-slate-900 px-1
                text-white text-md font-weight-bolder focus:ring-white
                z-10
                "
            />
            <select
                :name="name"
                :id="name"
                :value="modelValue"
                :required="required"
                class="border border-slate-400 w-full bg-slate-900 text-md text-white ring-inset ring-slate-400
                focus:ring-2 focus:ring-inset focus:ring-white
                disabled:opacity-50 disabled:cursor-not-allowed"
                @change="$emit('update:modelValue', $event.target.value)"
                :disabled="disabled"
            >
                <option :value="''" :selected="modelValue === ''" >{{ placeholder }}</option>
                <option
                    class="px-4 w-full bg-gray-900 text-md text-white"
                    v-for="option in options"
                    :key="option.key"
                    :value="option.value"
                    :selected="option.value === modelValue"
                >
                    {{ option.key }}
                </option>
            </select>
            <Error :name="name" />
        </div>

    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import {ChevronDownIcon} from "@heroicons/vue/20/solid";
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
    placeholder: {
        type: String,
        default: '',
    },
    modelValue : {
        type: Number,
        default: 0,
    },
    options : {
        type: Array,
        required: true,
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
