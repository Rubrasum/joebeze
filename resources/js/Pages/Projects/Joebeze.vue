<template>
    <div>
        <main class="bg-black mt-4">
            <article id="post-article"
                     class="container mx-auto px-16 pb-16 pt-8 my-8 border-x border-secondary-bg min-w-48 max-w-7xl w-full ">
                <div class="col-span-3">
                    <h1 class="text-white mb-10">The Dev Blog (Joebeze.com)</h1>
                </div>

                <div class="col-span-2 border-dashed border-y border-secondary-bg text-center flex justify-center items-center space-x-4 mb-4">
                    <h6 class="my-2 text-white">
                        This abomination that you've been looking at for the past few minutes.
                    </h6>
                </div>

                <p>Originally this was a place to link some of my work. But for a while I found this project outpacing the others in terms of publishable content, seeing as it was the only one whose entire purpose was to be put online and shown off. While I worked on these other projects more extensively, I found myself needing a test-case for solutions involving the web, and this site remained the only project I had taken the time to "publicize" with the web. So again, for the past couple months it has soaked up all the commits I could handle, without ever developing a reason for itself to live.</p>
                <br>
                <p>Either way let's review the steps it took to get here and maybe find a way to make this site useful for <i>someone</i> with an uncommon "Feature First" business strategy. </p>
                <br>
                <p>Also if you read along you'll see some of the pitfalls of general Windows Laravel Development and the complementary tools like Sail, WSL, Docker, Forge. </p>
                <br>
                <p>Another big reason to read along is if you ever planned to upgrade to Laravel 11, or implement Vue into your existing blade/Laravel site. This will be fairly specific to Inertia development, which means that you are missing out on some of the information needed to connect a frontend and backend framework, but otherwise are learning all the relevant information required to <i>build</i> a separate frontend and backend for your site. </p>

            </article>
        </main>
    </div>
</template>
<script setup>
import HomeLayout from "@/Layouts/HomeLayout.vue";

defineOptions({ layout: HomeLayout })

</script>
