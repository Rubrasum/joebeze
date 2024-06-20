<template>
    <Field>
        <Label :name="name" :label="label" :class="['block text-md px-2 leading-8 bg-slate-900 text-white']"/>
        <div :id="name" ref="quillEditor" class="quill-editor w-full"></div>
        <Error :name="name" />
    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {usePage} from "@inertiajs/vue3";
import {computed, onMounted, ref, defineEmits, watch} from "vue";
import Quill from 'quill';
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";

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

const emit = defineEmits(['update:modelValue']);
const quillEditor = ref(null);

onMounted(() => {

    const quill = new Quill(quillEditor.value, {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': '1' }, { 'header': '2' }, { 'font': [] }],
                [{ size: ['small', false, 'large', 'huge'] }, { 'color': [] }, { 'background': [] }],
                ['bold', 'italic', 'underline', 'strike', 'blockquote'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
                ['link', 'image', 'video'],
                ['clean']
            ],
        },
        debug: 'info',
    });
    // Apply custom styles
    const editor = quill.root;
    editor.style.minHeight = props.height === 'h-48' ? '12rem' : '24rem'; // Match h-48 and h-96
    editor.style.backgroundColor = '#1e293b'; // Tailwind Slate-900
    editor.style.color = '#ffffff'; // White text
    editor.style.padding = '1rem'; // Matching textarea padding


    quill.root.innerHTML = props.modelValue;

    quill.on('text-change', () => {
        emit('update:modelValue', quill.root.innerHTML);
    });
});

// Watch for external modelValue changes and update Quill
watch(() => props.modelValue, (newValue) => {
    if (quillEditor.value) {
        const quill = Quill.find(quillEditor.value);
        if (quill && quill.root.innerHTML !== newValue) {
            quill.root.innerHTML = newValue;
        }
    }
});


</script>

<style>
.ql-editor {
    background-color: #1e293b;
    color: #ffffff;
    padding: 1rem;
    border: none;
}

.ql-toolbar {
    background-color: #1e293b;
    border: none;
    color: #ffffff !important;
}

.ql-toolbar .ql-stroke {
    fill: none;
    stroke: #ffffff;
}

.ql-toolbar .ql-fill {
    fill: #ffffff;
    stroke: none;
}

.ql-toolbar .ql-picker {
    color: #ffffff;
}

.ql-container.ql-snow {
    border: 1px solid #4a5568;
    border-radius: 0.375rem;
}
</style>
