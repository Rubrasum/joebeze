<template>
    <header>
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-primary-text" @click="mobileMenuOpen = true">
                    <span class="sr-only">Open main menu</span>
                    <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                </button>
            </div>
            <PopoverGroup class="hidden lg:flex lg:gap-x-12">
                <Popover class="relative">
                    <PopoverButton class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-primary-text">
                        Product
                        <ChevronDownIcon class="h-5 w-5 flex-none text-accent" aria-hidden="true" />
                    </PopoverButton>

                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1"
                                enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150"
                                leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1"
                    >
                        <PopoverPanel
                            class="absolute -left-8 top-full z-10 mt-6 w-screen max-w-md overflow-hidden
                                   rounded-b-md bg-secondary-bg shadow-light-lg ring-1 ring-primary-gray"
                        >
                            <div class="p-4">
                                <div v-for="item in products" :key="item.name"
                                     class="group relative flex gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-primary-bg"
                                >
                                    <div
                                        class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg
                                        bg-primary-bg group-hover:bg-secondary-bg"
                                    >
                                        <component :is="item.icon" class="h-6 w-6 text-accent" aria-hidden="true" />
                                    </div>
                                    <div class="flex-auto">
                                        <a :href="item.href" class="block font-semibold text-primary-text">
                                            {{ item.name }}
                                            <span class="absolute inset-0" />
                                        </a>
                                        <p class="mt-1 text-secondary-text group-hover:text-accent">{{ item.description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 divide-x divide-primary-gray/[5] bg-primary-bg/[25]">
                                <a v-for="item in callsToAction" :key="item.name" :href="item.href" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-primary-text hover:text-accent hover:bg-secondary-bg">
                                    <component :is="item.icon" class="h-5 w-5 flex-none text-accent group-hover:text-primary-text" aria-hidden="true" />
                                    {{ item.name }}
                                </a>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>

                <a href="#" class="text-sm font-semibold leading-6 text-primary-text">Features</a>
                <a href="#" class="text-sm font-semibold leading-6 text-primary-text">Marketplace</a>

                <Popover class="relative">
                    <PopoverButton class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-primary-text">
                        Company
                        <ChevronDownIcon class="h-5 w-5 flex-none text-accent" aria-hidden="true" />
                    </PopoverButton>

                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                        <PopoverPanel class="absolute -left-8 top-full z-10 mt-6 w-96 rounded-b-md bg-secondary-bg p-4 shadow-light-lg ring-1 ring-primary-gray/[5]">
                            <div v-for="item in company" :key="item.name" class="relative group rounded-lg p-4 hover:bg-primary-bg text-primary-text  hover:text-accent">
                                <a :href="item.href" class="block text-sm font-semibold leading-6 ">
                                    {{ item.name }}
                                    <span class="absolute inset-0" />
                                </a>
                                <p class="mt-1 text-sm leading-6 text-secondary-text group-hover:text-primary-text">{{ item.description }}</p>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>
                <div class=" px-4 h-full z-[99] flex">
                    <nav class="h-full flex justify-between items-center">
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
            </PopoverGroup>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm font-semibold leading-6 text-primary-text">Log in <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
            <div class="fixed inset-0 z-10" />
            <DialogPanel class="fixed inset-y-0 right-0 z-10 flex w-full flex-col justify-between overflow-y-auto bg-secondary-bg sm:max-w-sm sm:ring-1 sm:ring-primary-gray/[10]">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-primary-text" @click="mobileMenuOpen = false">
                            <span class="sr-only">Close menu</span>
                            <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-primary-gray/[10]">
                            <div class="space-y-2 py-6">
                                <a v-for="item in products" :key="item.name" :href="item.href" class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-primary-text hover:bg-primary-bg">
                                    <div class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-primary-bg group-hover:bg-secondary-bg">
                                        <component :is="item.icon" class="h-6 w-6 text-secondary-text group-hover:text-accent" aria-hidden="true" />
                                    </div>
                                    {{ item.name }}
                                </a>
                            </div>
                            <div class="space-y-2 py-6">
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-primary-text hover:bg-primary-bg">Features</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-primary-text hover:bg-primary-bg">Marketplace</a>

                                <a v-for="item in company" :key="item.name" :href="item.href" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-primary-text hover:bg-primary-bg">{{ item.name }}</a>
                            </div>
                            <div class="py-6">
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-primary-text hover:bg-primary-bg">Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky bottom-0 grid grid-cols-2 divide-x divide-primary-gray/[5] bg-primary-bg text-center">
                    <a v-for="item in callsToAction" :key="item.name" :href="item.href" class="p-3 text-base font-semibold leading-7 text-primary-text hover:bg-secondary-bg">{{ item.name }}</a>
                </div>
            </DialogPanel>
        </Dialog>

    </header>
</template>

<script setup>
import { Link, router, usePage} from '@inertiajs/vue3'
import { ref, computed, watch } from 'vue'
import { Dialog, DialogPanel, Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    ArrowPathIcon,
    Bars3Icon,
    ChartPieIcon,
    CursorArrowRaysIcon,
    FingerPrintIcon,
    SquaresPlusIcon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'

const products = [
    { name: 'Analytics', description: 'Get a better understanding of your traffic', href: '#', icon: ChartPieIcon },
    { name: 'Engagement', description: 'Speak directly to your customers', href: '#', icon: CursorArrowRaysIcon },
    { name: 'Security', description: 'Your customers’ data will be safe and secure', href: '#', icon: FingerPrintIcon },
    { name: 'Integrations', description: 'Connect with third-party tools', href: '#', icon: SquaresPlusIcon },
    { name: 'Automations', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
]
const callsToAction = [
    { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
    { name: 'Contact sales', href: '#', icon: PhoneIcon },
]
const company = [
    { name: 'About us', href: '#', description: 'Learn more about our company values and mission to empower others' },
    { name: 'Careers', href: '#', description: 'Looking for you next career opportunity? See all of our open positions' },
    {
        name: 'Support',
        href: '#',
        description: 'Get in touch with our dedicated support team or reach out on our community forums',
    },
    { name: 'Blog', href: '#', description: 'Read our latest announcements and get perspectives from our team' },
]

import Dropdown from '@/Components/Categories/Dropdown.vue';

const page = usePage()
const posts = computed(() => page.props.posts)

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
