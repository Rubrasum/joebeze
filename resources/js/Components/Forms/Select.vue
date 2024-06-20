<template>
    <Field>
        <div class="relative">
            <Label :name="name" :label="label" class="absolute -top-3 left-2 inline-block bg-slate-900 px-1 text-white text-md font-weight-bolder" />
            <select
                :name="name"
                :id="name"
                :value="modelValue"
                :required="required"
                class="border border-slate-400 w-full bg-slate-900 text-md text-white px-4 rounded focus:ring-white"
                @change="$emit('update:modelValue', $event.target.value)"
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
        type: String,
        default: '',
    },
    options : {
        type: Array,
        required: true,
    },
    label : {
        type: String,
        default: null,
    }
});

const message = ref('');
</script>
