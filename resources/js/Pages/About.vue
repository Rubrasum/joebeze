<template>
    <div>
        <main class="bg-black mt-4">
            <article id="post-article"
                     class="container mx-auto px-16 pb-16 pt-8 my-8 border-x border-secondary-bg min-w-48 max-w-7xl w-full ">
                <div class="col-span-3">
                    <h1 class="text-white mb-10">About Me</h1>
                </div>

                <div class="col-span-2 border-dashed border-y border-secondary-bg text-center flex justify-center items-center space-x-4 mb-4">
                    <h6 class="my-2 text-white">
                        My name is Joseph Betbeze.
                    </h6>
                </div>

                <p>As a software engineer and consultant, I specialize in complex focused SaaS development, offering customized solutions that drive business growth and success.</p>

            </article>
        </main>
    </div>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({ layout: HomeLayout })

</script>
