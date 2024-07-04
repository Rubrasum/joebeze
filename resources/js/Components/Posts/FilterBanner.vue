<template>
    <div class="p-4 h-full z-[99] flex items-center justify-between">
        <div class="">
            <h2>Latest From the Blog</h2>
        </div>
        <nav class="h-full flex justify-between items-center">
            <div id="Logo container placeholder" class="w-full">
                <div class="block z-[110] max-w-[33.85vw]">
                    <h4 class="mr-2" :class="{ 'text-accent': currentCategory || page.props.search }" >Filter: </h4>
                </div>
            </div>
            <div class="hidden lg:flex items-center">
                <div class="relative mr-4" :class="{ hidden : !posts }">
                    <!-- Categories dropdown component -->
                    <Dropdown />
                </div>
                <div>
                    <form @submit.prevent="handleSearch" ref="form">
                        <input
                            v-if="currentCategory"
                            type="hidden"
                            name="category"
                            :value="currentCategory.name"
                        />
                        <input
                            type="search"
                            name="search"
                            placeholder="Search"
                            class="border border-accent rounded-lg px-4 py-2
           focus:outline-none focus:ring-2 focus:ring-offset-0 focus:ring-accent
           focus:shadow-none focus:border-accent
           bg-primary-bg text-primary-text"
                            v-model="search"
                        />

                    </form>
                </div>
            </div>
            <div class="lg:hidden">
                <button
                    @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-secondary-text hover:text-white
                            hover:bg-primary-bg focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent
                            bg-secondary-bg border-2 border-primary-bg"
                    aria-controls="mobile-menu"
                    :aria-expanded="open"
                >
                    <span class="sr-only">Open main menu</span>
                    <svg
                        class="block h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                    <svg
                        class="hidden h-6 w-6"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
        </nav>

        <div v-show="open" class="lg:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <div class="absolute lg:relative mb-4 top-[4.25rem] right-[0.3rem]">
                    <!-- Categories dropdown component -->
                    <Dropdown />
                </div>
                <div class="absolute lg:relative top-[6.5rem] right-[1rem]">
                    <form @submit.prevent="handleSearch">
                        <input
                            v-if="currentCategory"
                            type="hidden"
                            name="category"
                            :value="currentCategory.name"
                        />

                        <input
                            type="search"
                            name="search"
                            placeholder="Search"
                            class="border border-accent rounded-lg px-4 py-2 focus:outline-none
                                    focus:ring-2 focus:ring-accent bg-primary-bg text-primary-text"
                            v-model="search"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import { router, usePage} from '@inertiajs/vue3'
import { ref, computed, watch } from 'vue'
import Dropdown from '@/Components/Categories/Dropdown.vue'

const page = usePage()
const posts = computed(() => page.props.posts.data)

const mobileMenuOpen = ref(false)

const categories = computed(() => page.props.categories)
const currentCategory = computed(() => page.props.currentCategory)
const search = ref(page.props.search || '')
const open = computed(() => page.props.open)

function handleSearch () {
    router.get('/', {
        category: currentCategory.value?.slug,
        search: search.value,
    })
}

watch(() => page.props.search, (newSearch) => {
    search.value = newSearch;
});
</script>
