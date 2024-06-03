<template>
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
                    <span class="sr-only">Open main menu</span>
                    <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                </button>
            </div>
            <PopoverGroup class="hidden lg:flex lg:gap-x-12 z-50">
                <Link href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</Link>
                <Popover class="relative">
                    <PopoverButton class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">
                        Loan Programs
                        <ChevronDownIcon class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                    </PopoverButton>

                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                        <PopoverPanel class="absolute max-h-[36rem] overflow-y-auto thin-scrollbar -left-8 top-full mt-3 w-screen max-w-md overflow-hidden rounded-l-3xl rounded-r-md bg-white shadow-lg ring-1 ring-gray-900/5">
                            <div class="p-4 pt-2">
                                <div v-for="item in loanPrograms" :key="item.name" class="group relative flex gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <component :is="item.icon" class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" aria-hidden="true" />
                                    </div>
<!--                                    put div here -->

                                    <div class="flex-auto">
                                        <a :href="item.href" class="block font-semibold text-gray-900">
                                            {{ item.name }}
                                            <span class="absolute inset-0" />
                                        </a>
                                        <p class="mt-1 text-gray-600">{{ item.description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                                <a v-for="item in callsToAction" :key="item.name" :href="item.href" class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    <component :is="item.icon" class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                                    {{ item.name }}
                                </a>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>
                <Popover class="relative">
                    <PopoverButton class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">
                        Resources
                        <ChevronDownIcon class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                    </PopoverButton>

                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                        <PopoverPanel class="absolute -left-8 top-full z-10 mt-3 w-56 rounded-xl bg-white p-2 shadow-lg ring-1 ring-gray-900/5">
                            <a v-for="item in resources" :key="item.name" :href="item.href" class="block rounded-lg px-3 py-2 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
                        </PopoverPanel>
                    </transition>
                </Popover>
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Blog</a>
                <Popover class="relative">
                    <PopoverButton class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">
                        Careers
                        <ChevronDownIcon class="h-5 w-5 flex-none text-gray-400" aria-hidden="true" />
                    </PopoverButton>

                    <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                        <PopoverPanel class="absolute -left-8 top-full z-10 mt-3 w-80 rounded-xl bg-white p-2 shadow-lg ring-1 ring-gray-900/5">
                            <a v-for="item in careers" :key="item.name" :href="item.href" class="block rounded-lg px-3 py-2 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-50">{{ item.name }}</a>
                        </PopoverPanel>
                    </transition>
                </Popover>
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Reviews</a>
                <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Locations</a>
            </PopoverGroup>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="/" class="rounded-full bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Apply Now<span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
            <div class="fixed inset-0 z-10" />
            <DialogPanel class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
                        <span class="sr-only">Close menu</span>
                        <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Home</a>
                            <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    Loan Programs
                                    <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'h-5 w-5 flex-none']" aria-hidden="true" />
                                </DisclosureButton>
                                <DisclosurePanel class="mt-2 space-y-2">
                                    <DisclosureButton v-for="item in [...loanPrograms, ...callsToAction]" :key="item.name" as="a" :href="item.href" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</DisclosureButton>
                                </DisclosurePanel>
                            </Disclosure>
                            <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    Resources
                                    <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'h-5 w-5 flex-none']" aria-hidden="true" />
                                </DisclosureButton>
                                <DisclosurePanel class="mt-2 space-y-2">
                                    <DisclosureButton v-for="item in [...resources, ...callsToAction]" :key="item.name" as="a" :href="item.href" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</DisclosureButton>
                                </DisclosurePanel>
                            </Disclosure>

                            <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>
                            <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">
                                    Careers
                                    <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'h-5 w-5 flex-none']" aria-hidden="true" />
                                </DisclosureButton>
                                <DisclosurePanel class="mt-2 space-y-2">
                                    <DisclosureButton v-for="item in [...careers, ...callsToAction]" :key="item.name" as="a" :href="item.href" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">{{ item.name }}</DisclosureButton>
                                </DisclosurePanel>
                            </Disclosure>
                            <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Reviews</a>
                            <a href="/" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Locations</a>

                        </div>
                        <div class="py-6">
                            <a href="/" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                        </div>
                    </div>
                </div>
            </DialogPanel>
        </Dialog>
    </header>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
} from '@headlessui/vue'
import {
    ChartPieIcon,
    CursorArrowRaysIcon,
    FingerPrintIcon,
    SquaresPlusIcon,
    ArrowPathIcon,
    CurrencyDollarIcon,
    HomeModernIcon,
    BuildingOfficeIcon,
    BuildingStorefrontIcon,
    Bars3Icon,
    XMarkIcon,
    GlobeAmericasIcon,
    BanknotesIcon,
    BuildingOffice2Icon,
    AdjustmentsVerticalIcon,
    HomeIcon,
    BuildingLibraryIcon,
    ArrowDownCircleIcon,
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'

const loanPrograms = [
    {
        name: 'Conventional Loans',
        description: 'Traditional loans with fixed or adjustable rates for home buyers.',
        href: '#',
        icon: CurrencyDollarIcon
    },
    {
        name: '5% Down Jumbo Loans',
        description: 'Large loans for high-value properties with just 5% down payment.',
        href: '#',
        icon: BuildingOfficeIcon
    },
    {
        name: 'FHA Loans',
        description: 'Government-backed loans with lower down payment requirements.',
        href: '#',
        icon: BuildingLibraryIcon
    },
    {
        name: 'USDA Loans',
        description: 'Zero down payment loans for rural and suburban home buyers.',
        href: '#',
        icon: HomeIcon
    },
    {
        name: 'VA Loans',
        description: 'No down payment loans exclusively for veterans and military personnel.',
        href: '#',
        icon: ArrowDownCircleIcon
    },
    {
        name: 'Self Employed Loans',
        description: 'Flexible mortgage options designed for self-employed individuals.',
        href: '#',
        icon: AdjustmentsVerticalIcon
    },
    {
        name: 'Investor Cash Flow DSCR Program',
        description: 'Loans for investors based on property cash flow and DSCR.',
        href: '#',
        icon: CurrencyDollarIcon
    },
    {
        name: 'Investor Cash Flow Worksheet (DSCR)',
        description: 'Evaluate property cash flow and DSCR for informed investment decisions.',
        href: '#',
        icon: HomeModernIcon
    },
    {
        name: 'Pad Split Loans',
        description: 'Financing options for shared housing and co-living spaces.',
        href: '#',
        icon: BuildingOffice2Icon
    },
    {
        name: 'Short Term Rental Loans (AirBNB/VRBO)',
        description: 'Loans for purchasing and refinancing short-term rental properties.',
        href: '#',
        icon: BanknotesIcon
    },
    {
        name: 'Foreign National Loans',
        description: 'Mortgage solutions tailored for foreign nationals investing in the U.S.',
        href: '#',
        icon: GlobeAmericasIcon
    },
    {
        name: 'Commercial Loans',
        description: 'Financing options for commercial real estate projects.',
        href: '#',
        icon: BuildingStorefrontIcon
    },
];
const resources = [
    { name: 'Loan Programs', description: 'Traditional loans with fixed or adjustable rates for home buyers.', href: '#', icon: ChartPieIcon },
    { name: 'Loan Process', description: 'Large loans for high-value properties with just 5% down payment.', href: '#', icon: CursorArrowRaysIcon },
    { name: 'Mortgage Basics', description: 'Government-backed loans with lower down payment requirements.', href: '#', icon: FingerPrintIcon },
    { name: 'Online Forms', description: 'Zero down payment loans for rural and suburban home buyers.', href: '#', icon: SquaresPlusIcon },
    { name: 'Online Forms', description: 'No down payment loans exclusively for veterans and military personnel.', href: '#', icon: ArrowPathIcon },
    { name: 'Mortgage Calculators', description: 'Flexible mortgage options designed for self-employed individuals.', href: '#', icon: ArrowPathIcon },
    { name: 'Credit Card Builder', description: 'Loans for investors based on property cash flow and DSCR.', href: '#', icon: ArrowPathIcon }
];
const careers = [
    { name: 'Why Join MortgaaS?', description: 'Traditional loans with fixed or adjustable rates for home buyers.', href: '#', icon: ChartPieIcon },
    { name: 'Loan Officer New Hire Referral Program', description: 'Large loans for high-value properties with just 5% down payment.', href: '#', icon: CursorArrowRaysIcon },
    { name: 'Apply for a Loan Originator Position', description: 'Government-backed loans with lower down payment requirements.', href: '#', icon: FingerPrintIcon },
    { name: 'Career Opportunities', description: 'Zero down payment loans for rural and suburban home buyers.', href: '#', icon: SquaresPlusIcon },
    { name: 'Loan Office Dashboard', description: 'No down payment loans exclusively for veterans and military personnel.', href: '#', icon: ArrowPathIcon }
];
const callsToAction = [
    { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
    { name: 'Contact sales', href: '#', icon: PhoneIcon },
]

const mobileMenuOpen = ref(false)
</script>
