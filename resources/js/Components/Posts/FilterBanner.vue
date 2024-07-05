<template>

    <div class="border-b border-secondary-bg pb-5 sm:flex sm:items-center sm:justify-between">
        <h2 class="leading-6 text-primary-text">Latest From the Blog</h2>
        <div class="mt-3 sm:ml-4 sm:mt-0">
            <div class="flex rounded-md shadow-sm">
                <div class="relative flex focus-within:z-10">
                    <div class="flex-1 flex items-center justify-end mr-2">
                        <h5 :class="{'text-accent' : search || currentCategory}" >filter: </h5>
                    </div>
                    <div class="relative mr-4 flex-1" :class="{ hidden : !posts }">
                        <!-- Categories dropdown component -->
                        <Dropdown />
                    </div>
                    <div class="relative mr-4 w-full flex-1" :class="{ hidden : !posts }">
                        <form @submit.prevent="handleSearch" ref="form">
    <!--                        This is hidden. Please remember. You might be looking for dropdown ^^ above (categories)-->
                            <input
                                v-if="currentCategory"
                                type="hidden"
                                name="category"
                                :value="currentCategory.name"
                            />

                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 ">
                                <MagnifyingGlassIcon class="h-5 w-5" :class="{ 'text-accent' : search, 'text-primary-gray' : !search }" aria-hidden="true" />
                            </div>
                            <input
                                type="search"
                                name="search"
                                placeholder="Search"
                                class="block w-full rounded-none rounded-l-md border-0 py-1.5 pl-10 ring-1
                                        ring-inset ring-primary-gray placeholder:text-secondary-text focus:ring-2 focus:ring-inset
                                        focus:ring-accent border border-accent rounded-lg px-4 py-2
                                       bg-primary-bg text-primary-text"
                                v-model="search"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--            Idk this one -->
<!--<div class="lg:hidden">-->
<!--    <button-->
<!--        @click="open = !open"-->
<!--        class="inline-flex items-center justify-center p-2 rounded-md text-secondary-text hover:text-white-->
<!--                hover:bg-primary-bg focus:outline-none focus:ring-2 focus:ring-inset focus:ring-accent-->
<!--                bg-secondary-bg border-2 border-primary-bg"-->
<!--        aria-controls="mobile-menu"-->
<!--        :aria-expanded="open"-->
<!--    >-->
<!--        <span class="sr-only">Open main menu</span>-->
<!--        <svg-->
<!--            class="block h-6 w-6"-->
<!--            xmlns="http://www.w3.org/2000/svg"-->
<!--            fill="none"-->
<!--            viewBox="0 0 24 24"-->
<!--            stroke="currentColor"-->
<!--            aria-hidden="true"-->
<!--        >-->
<!--            <path-->
<!--                stroke-linecap="round"-->
<!--                stroke-linejoin="round"-->
<!--                stroke-width="2"-->
<!--                d="M4 6h16M4 12h16M4 18h16"-->
<!--            />-->
<!--        </svg>-->
<!--        <svg-->
<!--            class="hidden h-6 w-6"-->
<!--            xmlns="http://www.w3.org/2000/svg"-->
<!--            fill="none"-->
<!--            viewBox="0 0 24 24"-->
<!--            stroke="currentColor"-->
<!--            aria-hidden="true"-->
<!--        >-->
<!--            <path-->
<!--                stroke-linecap="round"-->
<!--                stroke-linejoin="round"-->
<!--                stroke-width="2"-->
<!--                d="M6 18L18 6M6 6l12 12"-->
<!--            />-->
<!--        </svg>-->
<!--    </button>-->
<!--</div>-->

<!--        <div v-show="open" class="lg:hidden" id="mobile-menu">-->
<!--            <div class="px-2 pt-2 pb-3 space-y-1">-->
<!--                <div class="absolute lg:relative mb-4 top-[4.25rem] right-[0.3rem]">-->
<!--                    &lt;!&ndash; Categories dropdown component &ndash;&gt;-->
<!--                    <Dropdown />-->
<!--                </div>-->
<!--                <div class="absolute lg:relative top-[6.5rem] right-[1rem]">-->
<!--                    <form @submit.prevent="handleSearch">-->
<!--                        <input-->
<!--                            v-if="currentCategory"-->
<!--                            type="hidden"-->
<!--                            name="category"-->
<!--                            :value="currentCategory.name"-->
<!--                        />-->

<!--                        <input-->
<!--                            type="search"-->
<!--                            name="search"-->
<!--                            placeholder="Search"-->
<!--                            class="border border-accent rounded-lg px-4 py-2 focus:outline-none-->
<!--                                    focus:ring-2 focus:ring-accent bg-primary-bg text-primary-text"-->
<!--                            v-model="search"-->
<!--                        />-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
</template>

<script setup>

import { router, usePage} from '@inertiajs/vue3'
import { ref, computed, watch } from 'vue'
import Dropdown from '@/Components/Categories/Dropdown.vue'
import { BarsArrowUpIcon, ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

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
