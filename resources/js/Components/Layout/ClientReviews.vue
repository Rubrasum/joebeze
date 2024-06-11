<template>
    <div class="bg-white py-20 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-xl text-center">
                <h2 class="text-lg font-semibold leading-8 tracking-tight text-indigo-600">Testimonials</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">We have worked with hundreds of home buyers</p>
            </div>
            <div class="mx-auto mt-16 flow-root max-w-2xl sm:mt-20 lg:mx-0 lg:max-w-none">
                <div class="-mt-8 sm:-mx-4 sm:columns-2 sm:text-[0] lg:columns-3">
                    <div v-for="testimonial in testimonials" :key="testimonial.author.handle" class="pt-8 sm:inline-block sm:w-full sm:px-4">
                        <figure class="rounded-2xl bg-gray-50 p-8 text-sm leading-6">
                            <blockquote class="text-gray-900">
                                <p>{{ `“${testimonial.body}”` }}</p>
                            </blockquote>
                            <figcaption class="mt-6 flex items-center gap-x-4">
                                <img class="h-10 w-10 rounded-full bg-gray-50" :src="testimonial.author.imageUrl" alt="" />
                                <div>
                                    <div class="font-semibold text-gray-900">{{ testimonial.author.name }}</div>
                                    <div class="text-gray-600">{{ `@${testimonial.author.handle}` }}</div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const testimonials = [
    {
        body: 'Working with this mortgage company was a breeze. They helped us secure a great rate and walked us through every step.',
        author: {
            name: 'Leslie Alexander',
            handle: 'lesliealexander',
            imageUrl: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'Their team was incredibly knowledgeable and always available to answer our questions. Highly recommend!',
        author: {
            name: 'James Smith',
            handle: 'jamessmith',
            imageUrl: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'They made the mortgage process simple and stress-free. We couldn’t be happier with the service.',
        author: {
            name: 'Emily Johnson',
            handle: 'emilyjohnson',
            imageUrl: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'Great experience from start to finish. They were transparent and made sure we got the best deal possible.',
        author: {
            name: 'Michael Brown',
            handle: 'michaelbrown',
            imageUrl: 'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'Their expertise and professionalism made a huge difference in our home-buying journey. Thank you!',
        author: {
            name: 'Sarah Davis',
            handle: 'sarahdavis',
            imageUrl: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'We felt confident and supported throughout the entire process. Highly recommend this mortgage lender.',
        author: {
            name: 'David Wilson',
            handle: 'davidwilson',
            imageUrl: 'https://images.unsplash.com/photo-1520975919482-236f8e9d87ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'They offered excellent rates and top-notch customer service. We are very satisfied with our experience.',
        author: {
            name: 'Ashley Martinez',
            handle: 'ashleymartinez',
            imageUrl: 'https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'From application to closing, everything was handled smoothly and efficiently. Thank you for your help!',
        author: {
            name: 'Christopher Lee',
            handle: 'christopherlee',
            imageUrl: 'https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
    {
        body: 'The best mortgage experience we’ve ever had. They went above and beyond to meet our needs.',
        author: {
            name: 'Jessica Thompson',
            handle: 'jessicathompson',
            imageUrl: 'https://images.unsplash.com/photo-1502767089025-6572583495b2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        },
    },
];
</script>
