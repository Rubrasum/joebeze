<template>
    <div class="inline-block">
        <transition-group name="slide-fade" tag="div" class="relative">
            <div v-for="(message, index) in messages" :key="index" class="mb-2 relative w-full" >
                <Message :message="message" class="relative" v-if="message.duration > 0" />
            </div>
        </transition-group>
    </div>
</template>

<script setup>
// TODO FIX THIS GARBAGE BECAUSE IT NEEDS TO USE FLASH MESSAGES LIKE THE DOCS SAID :(
import Message from "@/Components/Layout/FlashMessages/Message.vue";
import {computed, onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const page = usePage();
const messages = ref(page.props.messages);

// Custom duration
setInterval(() => {
    // handle duration
    for (const message of page.props.messages) {
        if (message.duration === undefined) {
            message.duration = 10;
        } else if (message.duration > 0) {
            message.duration -= 1;
        } else {
            message.invisible = true;
        }
    }
}, 1000);

onMounted(() => {
    setInterval(() => {
        // if all messages invisible, remove all messages
        if (page.props.messages.every(message => message.invisible)) {
            page.props.messages = [];
        }
    }, 100000);
});

</script>

<style >
.slide-fade-enter-active, .slide-fade-leave-active{
    transition: opacity 1s, transform 1s;
}
.slide-fade-enter-from, .slide-fade-leave-to {
    opacity: 0;
    transform: translateY(-20px);
}
.slide-fade-move {
    transition: transform 1s ease;
}
</style>

