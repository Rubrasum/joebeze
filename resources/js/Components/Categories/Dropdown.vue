<template>
    <div>
        <button
            @click="toggleDropdown"
            class="mr-1 lg:w-64 flex text-left lg:inline-flex border border-gray-300 rounded-lg px-2 py-2 bg-white text-gray-800"
        >
            {{ currentCategory ? currentCategory.name : 'All Categories' }}
            <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400 absolute right-4" aria-hidden="true" />
        </button>

        <div v-if="isDropdownOpen" class="absolute bg-white border border-gray-300 shadow-lg z-50 inset-x-0 py-1 w-full rounded-b-xl overflow-auto max-h-52
">
            <DropdownItem
                @click="updatePosts('')"
                :active="!currentCategory"
            >
                All Categories
            </DropdownItem>

            <DropdownItem
                v-for="category in categories"
                :key="category.slug"
                :active="currentCategory && currentCategory.slug === category.slug"
                @click="updatePosts(category.slug)"
            >
                {{ category.name }}
            </DropdownItem>
        </div>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue'
// import Icon from './Icon.vue'
import DropdownItem from './DropdownItem.vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import {router, usePage} from '@inertiajs/vue3'

const page = usePage()

const categories = computed(() => page.props.categories)
const currentCategory = computed(() => page.props.currentCategory)
const isDropdownOpen = ref(false)
const search = computed(() => page.props.search)

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value
}

const updatePosts = (categorySlug) => {
    isDropdownOpen.value = false

    router.get('/', {
        category: categorySlug,
        search: search.value,
    })
}
</script>
