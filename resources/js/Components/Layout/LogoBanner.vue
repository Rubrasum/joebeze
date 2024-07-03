<template>
    <header>
        <div id="nav_container" class="nav_container h-24 flex items-center items-center justify-center" >
            <Link :href="`/`" preserve-state>
                <SpecialLogo v-once/>
            </Link>
            <div class="container mx-auto px-4 h-full z-[99]">
                <nav class="h-full flex justify-between items-center py-4">
                    <div id="Logo container placeholder" class="w-full">
                        <div class="block z-[110] max-w-[33.85vw]"></div>
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
                                    class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    v-model="search"
                                />
                            </form>
                        </div>
                    </div>
                    <div class="lg:hidden">
                        <button
                            @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white bg-gray-800 border-2 border-gray-300"
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
                                    type="text"
                                    name="search"
                                    placeholder="Search"
                                    class="block w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    v-model="search"
                                />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import {computed, ref, watch} from 'vue';

import SpecialLogo from '@/Components/SpecialLogo.vue';
import Dropdown from '@/Components/Categories/Dropdown.vue';
import {Link, router, usePage} from '@inertiajs/vue3';

const page = usePage()
const posts = computed(() => page.props.posts)
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
