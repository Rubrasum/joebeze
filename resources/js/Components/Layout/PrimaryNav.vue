<template>
    <nav class="mx-auto flex max-w-7xl items-center justify-center p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:hidden">
            <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-primary-text"
                    @click="mobileMenuOpen = true">
                <span class="sr-only">Open main menu</span>
                <Bars3Icon class="h-6 w-6" aria-hidden="true" />
            </button>
        </div>
        <PopoverGroup class="hidden lg:flex lg:gap-x-12">
            <Link :href="`/`" class="text-primary py-3 nav-link"><h5 class="leading-6 text-sm ">Home</h5></Link>
            <Popover class="relative">
                <PopoverButton class="flex items-center gap-x-1 text-sm leading-6 text-primary-text py-3">
                    <h5 class="leading-6 text-sm fake-link nav-link">Portfolio</h5>
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
                            <div v-for="item in projects" :key="item.name"
                                 class="group relative flex gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-primary-bg"
                            >
                                <div
                                    class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg
                                    bg-primary-bg group-hover:bg-secondary-bg"
                                >
                                    <component :is="item.icon" class="h-6 w-6 text-accent" aria-hidden="true" />
                                </div>
                                <div class="flex-auto">
                                    <Link :href="item.href" class="block font-semibold text-primary-text">
                                        {{ item.name }}
                                        <span class="absolute inset-0" />
                                    </Link>
                                    <p class="mt-1 text-secondary-text group-hover:text-accent">{{ item.description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 border-t border-accent divide-x divide-primary-gray/[5] bg-primary-bg/[25]">
                            <a v-for="item in callsToAction" :key="item.name" :href="item.href"
                               class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6
                               text-primary-text hover:text-accent hover:shadow-light-lg-inset" target="_blank" rel="noopener noreferrer" >
                                <component :is="item.icon" class="h-5 w-5 flex-none text-accent group-hover:text-primary-text"
                                           aria-hidden="true" />
                                {{ item.name }}
                            </a>
                        </div>
                    </PopoverPanel>
                </transition>
            </Popover>

            <Popover class="relative">
                <PopoverButton class="flex items-center gap-x-1 text-sm leading-6 text-primary-text py-3">
                    <h5 class="leading-6 text-sm fake-link nav-link">Services</h5>
                    <ChevronDownIcon class="h-5 w-5 flex-none text-accent" aria-hidden="true" />
                </PopoverButton>

                <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150"
                            leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                    <PopoverPanel
                        class="absolute -left-8 top-full z-10 mt-6 w-96 rounded-b-md bg-secondary-bg p-4
                        shadow-light-lg ring-1 ring-primary-gray/[5] h-[32rem] overflow-y-auto thin-scrollbar">
                        <div v-for="item in services" :key="item.name"
                             class="relative group rounded-lg p-4 hover:bg-primary-bg text-primary-text ">
                            <a :href="item.href" class="block text-sm font-semibold leading-6 group-hover:text-accent">
                                {{ item.name }}
                                <span class="absolute inset-0" />
                            </a>
                            <p class="mt-1 text-sm leading-6 text-secondary-text group-hover:text-primary-text">{{ item.description }}</p>
                        </div>
                    </PopoverPanel>
                </transition>
            </Popover>

            <Link :href="`/about-me`" class="text-primary-text py-3 nav-link"><h5 class="leading-6 text-sm">About Me</h5></Link>
            <Link :href="`/contact`" class="text-primary-text flex items-center gap-x-1 text-sm leading-6 text-primary-text py-3 nav-link">
                <h5 class="leading-6 text-sm">Contact</h5>
            </Link>

        </PopoverGroup>
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
                            <a v-for="item in projects" :key="item.name" :href="item.href" class="group -mx-3 flex items-center gap-x-6 rounded-lg p-3 text-base font-semibold leading-7 text-primary-text hover:bg-primary-bg">
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
                <div v-for="item in callsToAction" :key="item.name" >
                    <a target="_blank" rel="noopener noreferrer" :href="item.href" class="p-3 text-base font-semibold leading-7 text-primary-text hover:bg-secondary-bg">{{ item.name }}</a>
                </div>
            </div>
        </DialogPanel>
    </Dialog>
</template>

<script setup>

import { Dialog, DialogPanel, Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    DocumentTextIcon,
    Bars3Icon,
    EyeIcon,
    NewspaperIcon,
    PhoneArrowDownLeftIcon,
    Squares2X2Icon,
    XMarkIcon,
    ArrowDownTrayIcon,
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'
import { Link } from '@inertiajs/vue3'

const projects = [
    { name: 'Red Tag Scan', description: 'Match your EFT inventory against 3000+ template icons', href: '/projects/redtagscan', icon: EyeIcon },
    { name: 'The Dev Blog', description: 'A lightweight web strategy', href: '/projects/joebeze', icon: NewspaperIcon },
    { name: 'MortgaaS', description: 'Lead Generation taken to the edge with monitoring and automation.', href: '/projects/mortgaas', icon: PhoneArrowDownLeftIcon },
    { name: 'Anamorphosis', description: 'C++ Powder physics engine, compiled with WASM and run on your browser', href: '/projects/anamorphosis', icon: PhoneArrowDownLeftIcon },
]
const callsToAction = [
    { name: 'Github', href: 'https://github.com/Rubrasum/', icon: Squares2X2Icon },
    { name: 'Certifications', href: 'https://www.linkedin.com/in/joseph-betbeze-08b503155/#:~:text=and%20%2B9%20skills-,Licenses%20%26%20certifications,-Licenses%20%26%20certifications', icon: DocumentTextIcon },
]
const services = [
    { name: 'Responsive Design', href: '#', description: 'Beautifully tailored designs that bring an appeal to your business on any device.' },
    { name: 'SEO Strategy', href: '#', description: 'A comprehensive search engine optimization strategy for long term keyword acquisition.' },
    { name: 'Lead Management', href: '#', description: 'Learn more about our company values and mission to empower others.' },
    { name: 'Real Time Analytics', href: '#', description: 'Looking for you next career opportunity? See all of our open positions.' },
    { name: 'Support', href: '#', description: 'Get in touch with our dedicated support team or reach out on our community forums.' },
    { name: 'Custom Admin Tools', href: '#', description: 'Data Integration, Dashboards, Custom Reports, Training and Support.' },
    { name: 'End to End Testing', href: '#', description: 'All your features tested automatically following an update.'}
]

import Dropdown from '@/Components/Categories/Dropdown.vue';
import {ref} from "vue";

const mobileMenuOpen = ref(false)

</script>
