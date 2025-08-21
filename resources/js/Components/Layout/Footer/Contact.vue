<template>
    <div class="md:w-2/5 mt-8 md:mt-0 ml-8">
        <h4 class="text-2xl font-bold mb-4 text-white">Contact</h4>
        <ul class="list-none">
            <li class="mb-2 flex items-center group">
                <InboxArrowDownIcon  class="h-5 w-5 fill-slate-500 group-hover:fill-white mr-2"/>
                <a href="mailto:dev@joebeze.com" class="group-hover:text-white"> dev@joebeze.com</a>
            </li>
            <li class="mb-2 flex items-start">
                <div class="mr-2"><MapPinIcon class="h-5 w-5 fill-slate-500 group-hover:fill-white"/></div>
                <div>
                    <span>Joseph Betbeze</span>
                    <br>
                    <span>Jacksonville, FL</span>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { MapPinIcon, InboxArrowDownIcon, DevicePhoneMobileIcon } from '@heroicons/vue/20/solid';

</script>

