<template>
    <Field>
        <div class="relative">
            <Label :name="name" :label="label" class="absolute -top-2 left-2 inline-block bg-slate-900 px-1 text-white text-xs font-medium" />
            <select
                :name="name"
                :id="name"
                :value="modelValue"
                :required="required"
                class="border border-white bg-gray-900 text-white p-2 rounded"
                @change="$emit('update:modelValue', $event.target.value)"
            >
                <option :value="''" :selected="modelValue === ''" >{{ placeholder }}</option>
                <option
                    v-for="option in options"
                    :key="option.key"
                    :value="option.value"
                    :selected="option.value === modelValue"
                >
                    {{ option.key }}
                </option>
            </select>
            <ChevronDownIcon class="absolute right-2 top-2 text-white" />
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
