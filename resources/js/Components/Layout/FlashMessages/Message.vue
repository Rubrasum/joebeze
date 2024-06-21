<template>
    <div v-if="message.type === 'information'">
        <Information :message="message" />
    </div>
    <div v-else-if="message.type === 'success'">
        <Success :message="message" />
    </div>
    <div v-else-if="message.type === 'error'">
        <Error :message="message" />
    </div>
    <div v-else-if="message.type === 'warning'">
        <Warning :message="message" />
    </div>

</template>

<script setup>
import Information from '@/Components/Layout/FlashMessages/Information.vue';
import Success from '@/Components/Layout/FlashMessages/Success.vue';
import Error from '@/Components/Layout/FlashMessages/Error.vue';
import Warning from '@/Components/Layout/FlashMessages/Warning.vue';

const props = defineProps({
    message: {
        type: Object,
        default: {
            title: "",
            message: "",
            visible: true,
            duration: 0,
            type: "information"
        }
    }
});
</script>
