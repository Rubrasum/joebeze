<template>
    <div v-if="showBanner" class="relative isolate flex items-end gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
        <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
        </div>
        <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
            <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
        </div>
        <div class="flex flex-1">
            <p class="text-sm leading-6 text-gray-900 flex flex-1 justify-end">
                <a href="#" class="flex">
                    <MapPinIcon class="h-6 w-6 text-blue-500" aria-hidden="true" />Locate a Branch
                    &nbsp;
                    <UserIcon class="h-6 w-6 text-blue-500" aria-hidden="true" />Locate a Loan Officer
                </a>
            </p>
            <div class="flex flex-1 justify-end">
                <button @click="dismissBanner" type="button" class="ml-auto p-1 focus-visible:outline-offset-[-4px]">
                    <span class="sr-only">Dismiss</span>
                    <XMarkIcon class="h-5 w-5 text-gray-900" aria-hidden="true" />
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { XMarkIcon, MapPinIcon, UserIcon } from '@heroicons/vue/20/solid'

// Use ref to make it reactive
const showBanner = ref(localStorage.getItem('showBanner') !== 'false')

const dismissBanner = () => {
    showBanner.value = false
    localStorage.setItem('showBanner', 'false')
}

const resetBanner = () => {
    showBanner.value = true
    localStorage.removeItem('showBanner')
}

const checkBannerStatus = () => {
    showBanner.value = localStorage.getItem('showBanner') !== 'false'
}

onMounted(() => {
    resetBanner()
    checkBannerStatus()
})
</script>

<style scoped>

</style>
