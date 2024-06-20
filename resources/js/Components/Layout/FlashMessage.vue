<template>
    <transition-group name="fade" tag="div">
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
    </transition-group>
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

// Custom duration
setInterval(() => {
    for (const key in page.props.messages) {
        // handle duration
        for (const message of page.props.messages[key]) {
            if (message.duration === undefined) {
                message.duration = 10;
            } else if (message.duration > 0) {
                message.duration -= 1;
            } else {
                // remove the message
                page.props.messages[key].splice(page.props.messages[key].indexOf(message), 1);
            }
        }
    }
}, 1000);

</script>

<style>
.fade-enter-active, .fade-leave-active {
    @apply transition-opacity duration-500;
}
.fade-enter-from, .fade-leave-to {
    @apply opacity-0;
}
</style>
