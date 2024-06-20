<template>
    <div v-for="message in messages.success" :key="message.id">
        <Success :message="message" />
    </div>
    <div v-for="message in messages.error" :key="message.id">
        <Error :message="message" />
    </div>
    <div v-for="message in messages.warning" :key="message.id">
        <Warning :message="message" />
    </div>
    <div v-for="message in messages.information" :key="message.id">
        <Information :message="message" />
    </div>
</template>

<script setup>
import Success from '@/Components/Layout/FlashMessages/Success.vue';
import Error from '@/Components/Layout/FlashMessages/Error.vue';
import Warning from '@/Components/Layout/FlashMessages/Warning.vue';
import Information from '@/Components/Layout/FlashMessages/Information.vue';
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";

const page = usePage();
const messages = computed(() => page.props.messages);

// every 20 seconds clear the messages
setInterval(() => {
    page.props.messages = {
        success: [],
        error: [],
        warning: [],
        information: [],
    };
}, 20000);

</script>
