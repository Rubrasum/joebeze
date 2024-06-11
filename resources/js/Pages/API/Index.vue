<script setup>
import ApiTokenManager from '@/Pages/API/Partials/ApiTokenManager.vue';
import AppLayout from '@/Layouts/AppLayout_old.vue';
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineProps({
    tokens: Array,
    availablePermissions: Array,
    defaultPermissions: Array,
});
</script>

<template>
    <HomeLayout title="API Tokens">
        <!-- Ok this is the Layout. I do not understand this. -->
        <template #Header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                API Tokens
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <ApiTokenManager
                    :tokens="tokens"
                    :available-permissions="availablePermissions"
                    :default-permissions="defaultPermissions"
                />
            </div>
        </div>
    </HomeLayout>
</template>
