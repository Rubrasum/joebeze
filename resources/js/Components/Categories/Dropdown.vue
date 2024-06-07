<template>
    <div>
        <button
            @click="toggleDropdown"
            class="mr-1 lg:w-64 flex text-left lg:inline-flex border border-gray-300 rounded-lg px-2 py-2 bg-white text-gray-800"
        >
            {{ currentCategory ? currentCategory.name : 'All Categories' }}
            <Icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>

        <div v-if="isDropdownOpen" class="absolute bg-white border border-gray-300 shadow-lg mt-2.5 z-50">
            <DropdownItem
                :href="`/?${buildQueryString({ category: null })}`"
                :active="!currentCategory"
            >
                All Categories
            </DropdownItem>

            <DropdownItem
                v-for="category in categories"
                :key="category.slug"
                :href="`/?${buildQueryString({ category: category.slug })}`"
                :active="currentCategory && currentCategory.slug === category.slug"
            >
                {{ category.name }}
            </DropdownItem>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
// import Icon from './Icon.vue'
import DropdownItem from './DropdownItem.vue'

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    currentCategory: {
        type: Object,
        default: null
    }
})
const categories = ref(props.categories)
const currentCategory = ref(props.currentCategory)
const isDropdownOpen = ref(false)

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value
}

const buildQueryString = (params) => {
    const query = new URLSearchParams(window.location.search)
    Object.keys(params).forEach((key) => {
        if (params[key] === null) {
            query.delete(key)
        } else {
            query.set(key, params[key])
        }
    })
    return query.toString()
}
</script>
