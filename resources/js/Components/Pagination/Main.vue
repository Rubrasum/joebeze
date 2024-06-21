<template>
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >Previous</a>
            <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ ' ' }}
                    <span class="font-medium">{{ items.from }}</span>
                    {{ ' ' }}
                    to
                    {{ ' ' }}
                    <span class="font-medium">{{ items.to }}</span>
                    {{ ' ' }}
                    of
                    {{ ' ' }}
                    <span class="font-medium">{{ items.total }}</span>
                    {{ ' ' }}
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                     <Link v-for="link in items.links"
                           :href="link.url"
                           class="relative inline-flex items-center w-8 py-1.5 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 focus:z-20 focus:outline-offset-0"
                           :class="link.url === null || link.active ? 'bg-gray-200 text-gray-600 cursor-default' : 'hover:bg-gray-50'"

                     >
                         <div v-if="link.label.includes('Next')" class="mx-auto">
                             <div class="flex">
                                <ChevronRightIcon class="h-5 w-5 ml-1" aria-hidden="true" />
                             </div>
                         </div>
                         <div v-else-if="link.label.includes('Previous')" class="mx-auto">
                             <div class="flex">
                                 <ChevronLeftIcon class="h-5 w-5 mr-1" aria-hidden="true" />
                             </div>
                         </div>
                         <div v-else class="mx-auto">
                             {{ link.label }}
                         </div>
                     </Link>
                </nav>
            </div>
        </div>
    </div>
</template>
<script setup>
import {Link} from '@inertiajs/vue3';
import {ChevronLeftIcon, ChevronRightIcon} from "@heroicons/vue/20/solid/index.js";
import {computed} from "vue";

const props = defineProps ({
    items : {
        type: Object,
        required: true
    }
});


const items = computed(() => props.items)
</script>
