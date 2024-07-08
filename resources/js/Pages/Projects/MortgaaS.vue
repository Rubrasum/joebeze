<template>
    <div>
        <main class="bg-black mt-4">
            <article id="post-article"
                     class="container mx-auto px-16 pb-16 pt-8 my-8 border-x border-secondary-bg min-w-48 max-w-7xl w-full ">
                <div class="col-span-3">
                    <h1 class="text-white mb-10">Mortgaas (This name is being workshopped)</h1>
                </div>

                <div class="col-span-2 border-dashed border-y border-secondary-bg text-center flex justify-center items-center space-x-4 mb-4">
                    <h6 class="my-2 text-white">
                        Imagine the most modern website
                    </h6>
                </div>

                <p>The inspiration behind this project is pretty simple and personal. Tarkov developers use the Alpha container as the quintissential selling point for the $140 version of the game. And personally I never wanted to have to pay for that privelege. But to get by without it, you need to manage your stash inventory perfectly. I thought, "wouldn't it be great if I could scan my inventory for quest and items worth selling? Then I could make decisions faster in game, and also learn the items even faster, with an incredible edge on recent changes". At the time, there were no examples of this besides ratscan, which was incredibly unpopular due to the fear of banning. Nowadays a version exists but it is disappointing at best. </p>
                <br>
                <p>Currently the version I have developed exists as a python API.</p>
                <br>
                <p>More information soon...</p>

            </article>
        </main>
    </div>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({ layout: HomeLayout })

</script>
