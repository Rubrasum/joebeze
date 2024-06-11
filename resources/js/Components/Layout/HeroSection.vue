<template>
    <div class="relative overflow-hidden max-h-[48rem]">
        <div class="mx-auto max-w-7xl bg-slate-100">
            <div class="relative z-10 pt-14 lg:w-full lg:max-w-2xl ">
<!--                same gradient effect here -->
                <svg class="absolute inset-y-0 right-8 hidden h-full w-80 translate-x-1/2 transform fill-slate-100 lg:block" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="0,0 90,0 50,100 0,100" />
                </svg>

                <div class="relative px-6 py-32 sm:py-40 lg:px-8 lg:py-[8rem] lg:pr-0">
                    <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-xl">
                        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Realize Your Dream of Home Ownership</h1>
                        <div v-for="(slide, index) in slides" :key="index" class="overflow-hidden absolute p-2 py-4 mr-14" >
                            <p v-text="slide.caption" class="object-cover hidden slide-caption"> </p>

                            <!--            <p>{{ slide.caption }}</p>-->
                        </div>
                        <div class="mt-14 flex items-center gap-x-6">
                            <a :href="slides[0].link" class="
                            rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm
                            hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2
                            focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >Get started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class=" bg-slate-100 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 slider-container">
            <div v-for="(slide, index) in slides" :key="index" class="slide absolute hidden">
                <img :src="slide.image" :alt="slide.caption" class="object-cover">
                <!--            <p>{{ slide.caption }}</p>-->
            </div>
        </div>
        <div class="z-[9] bg-slate-100 lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/2 slider-container">
        </div>

    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';

const slides = ref([
    { image: 'images/slide1.png', caption: 'Traditional loans with fixed or adjustable rates for home buyers.', link: "#" },
    { image: 'images/slide2.png', caption: 'Large loans for high-value properties with just 5% down payment.', link: "#"  },
    { image: 'images/slide3.png', caption: 'Government-backed loans with lower down payment requirements.', link: "#"  },
    { image: 'images/slide4.png', caption: 'Zero down payment loans for rural and suburban home buyers.', link: "#"  },
    { image: 'images/slide5.png', caption: 'No down payment loans exclusively for veterans and military personnel.', link: "#"  },
]);

onMounted(() => {
    let currentIndex = 0;
    const slideElements = document.querySelectorAll('.slide');
    const slideCaptionElements = document.querySelectorAll('.slide-caption');
    const slideLinkElements = document.querySelectorAll('.slide-link');
    slideElements.forEach((slide, index) => {
        if (index === currentIndex) {
            slide.classList.remove('hidden');
        }
    });
    slideCaptionElements.forEach((caption, index) => {
        if (index === currentIndex) {
            caption.classList.remove('hidden');
        }
    });

    setInterval(() => {
        currentIndex = (currentIndex + 1) % slideElements.length;

        slideCaptionElements.forEach((caption, index) => {
            if (index === currentIndex) {
                caption.classList.add('slide-in-from-right-caption');
                if (caption.classList.contains('hidden')) {
                    caption.classList.remove('hidden');
                } else {
                    caption.classList.remove('slide-out-to-left-caption');
                }
            } else {
                caption.classList.add('slide-out-to-left-caption');
                caption.classList.remove('slide-in-from-right-caption');
            }
        });

        slideElements.forEach((slide, index) => {
            if (index === currentIndex) {
                slide.classList.add('slide-in-from-right');
                if (slide.classList.contains('hidden')) {
                    slide.classList.remove('hidden');
                } else {
                    slide.classList.remove('slide-out-to-left');
                }
            } else {
                slide.classList.add('slide-out-to-left');
                slide.classList.remove('slide-in-from-right');
            }
        });

        // timeoute for 2 seconds and then hide
    }, 8000);
});
</script>

<style scoped>

.slide {
    width: 100%;
    height: 100%;
}
.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the container without overflow */
    display: block;
}

.slide-out-to-left {
    animation: slideOutToLeft 6s forwards;
}
.slide-in-from-right {
    animation: slideInFromRight 4s forwards;
}
.slide-out-to-left-caption {
    animation: slideOutToLeft 2s forwards;
}
.slide-in-from-right-caption {
    animation: slideInFromRight 3s forwards;
}

@keyframes slideOutToLeft  {
    from { transform: translateX(0%); }
    to { transform: translateX(-110%); }
}

@keyframes slideInFromRight {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}
</style>



<!--File Names for Inertia Laravel App with Setup Mode
Components
Slider.vue
Slide.vue
SliderNavigation.vue
SlideTransition.vue
AutoplayControl.vue
ResponsiveSlider.vue
SliderAccessibility.vue
LazyLoadSlide.vue
AdminSliderSettings.vue
AdminSlideEditor.vue
Composables
useSliderSettings.js
useSlideData.js
useAutoplay.js
useResponsiveDesign.js
useAccessibility.js
Resources
sliderImages.json
sliderSettings.json
Routes
web.php
Controllers
SliderController.php
AdminSliderController.php
Models
Slider.php
Slide.php
Migrations
create_sliders_table.php
create_slides_table.php
Policies
SliderPolicy.php
SlidePolicy.php
Requests
StoreSliderRequest.php
UpdateSliderRequest.php
StoreSlideRequest.php
UpdateSlideRequest.php
Services
SliderService.php
SlideService.php
Views
SliderIndex.blade.php
AdminSliderIndex.blade.php
AdminSliderEdit.blade.php
AdminSlideEdit.blade.php
Descriptions
Components: Vue components that build the slider and its individual parts, including navigation, transitions, autoplay controls, and accessibility features. Admin components allow for customization from the backend.
Composables: JavaScript composables that handle the logic for settings, data management, autoplay functionality, responsive design adjustments, and accessibility features.
Resources: JSON files that store default settings and images for the slider.
Routes: Define the routes for accessing the slider and admin pages.
Controllers: Handle the business logic for displaying and managing sliders and slides.
Models: Represent the slider and slide data in the database.
Migrations: Database migration files for creating the sliders and slides tables.
Policies: Define the authorization logic for managing sliders and slides.
Requests: Handle validation logic for storing and updating sliders and slides.
Services: Contain the business logic for sliders and slides.
Views: Blade templates for displaying the sliders and admin interfaces.

lower resolution look:

Features of Image Sliders/Carousels:
Image Rotation:

Automatic Slide
Manual Navigation (Previous/Next)
Navigation Controls:

Arrows (Previous/Next)
Dots/Pagination
Transition Effects:

Fade
Slide
Custom Animations
Timing Controls:

Slide Duration
Transition Speed
Responsiveness:

Adaptive Layout for Different Screen Sizes




continue
ChatGPT
Indicators:

Dot Indicators
Thumbnail Indicators
Content Support:

Text Overlays
CTA Buttons
Looping Options:

Infinite Loop
No Loop (stop at the end)
Autoplay Controls:

Start/Stop Autoplay
Autoplay Delay
Accessibility Features:

ARIA Labels
Keyboard Navigation
Customization Options:

Custom Styles
Custom Animations
Loading Optimizations:

Lazy Loading
Preloading Next/Previous Slides
Integration with Other Components:

Syncing with Thumbnails
Syncing with Text Content
Modularization for Sliders/Carousels
Core Slider Component:

Handles the overall structure and functionality of the slider.
Example: Slider.vue
Slide Component:

Represents each individual slide within the slider.
Example: Slide.vue
Navigation Controls Component:

Manages the navigation controls like previous/next arrows and dot indicators.
Example: SliderNavigation.vue
Transition Effects Component:

Handles different transition effects between slides.
Example: SlideTransition.vue
Autoplay Component:

Manages autoplay functionality and related controls.
Example: AutoplayControl.vue
Responsive Design Component:

Ensures the slider is responsive and adapts to different screen sizes.
Example: ResponsiveSlider.vue
Accessibility Component:

Adds accessibility features like ARIA labels and keyboard navigation.
Example: SliderAccessibility.vue
Lazy Loading Component:

Manages lazy loading for the slides to optimize performance.
Example: LazyLoadSlide.vue

-->
