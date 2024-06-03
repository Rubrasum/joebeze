<template>
    <div class="bg-slate-100 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <div>
                    <h2 class="text-base font-semibold leading-7 text-indigo-600">All-in-one platform</h2>
                    <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Everything you need...</p>
                    <p class="mt-6 text-base leading-7 text-gray-600"
                    ><span class="text-2xl text-black font-extrabold">And then some</span>. This platform is custom-built and tailored specifically for you. With an extensive list of features designed to meet your unique needs, we ensure every integration is seamless and every client experience is perfected to the highest standards. We're not limited by pre-defined capabilities – if you have an idea, we'll work with you to make it a reality. </p>
                </div>
                <dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-5 text-base leading-7 text-gray-600 sm:grid-cols-2 lg:gap-y-10">
                    <div v-for="feature in features.slice(0, 6)" :key="feature.name" class="relative pl-9">
                        <dt class="font-semibold text-gray-900">
                            <component :is="feature.icon" class="absolute left-0 top-1 h-5 w-5 text-indigo-500" aria-hidden="true" />
                            {{ feature.name }}
                        </dt>
                        <dd class="mt-2">{{ feature.description }}</dd>
                    </div>
                </dl>
            </div>
            <div class="mx-auto mt-8 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <dl class="col-span-3 grid grid-cols-1 gap-x-8 gap-y-5 text-base leading-7 text-gray-600 sm:grid-cols-2 lg:grid-cols-3 lg:gap-y-10">
                    <div v-for="feature in features.slice(6)" :key="feature.name" class="relative pl-9">
                        <dt class="font-semibold text-gray-900">
                            <component :is="feature.icon" class="absolute left-0 top-1 h-6 w-6 text-indigo-500" aria-hidden="true" />
                            {{ feature.name }}
                        </dt>
                        <dd class="mt-2">{{ feature.description }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>

<script setup>import {
    CheckIcon,
    InboxArrowDownIcon,
    EnvelopeIcon,
    PresentationChartBarIcon,
    UserPlusIcon,
    RectangleGroupIcon,
    CircleStackIcon,
    DevicePhoneMobileIcon,
    ClipboardDocumentIcon,
    BoltIcon,
    CogIcon,
    ChatBubbleLeftRightIcon,
    WrenchScrewdriverIcon
} from '@heroicons/vue/20/solid';

const features = [
    {
        name: 'Lead Management System',
        description: 'Efficiently manage and track your sales leads from initial contact to closing.',
        icon: InboxArrowDownIcon
    },
    {
        name: 'Email Alerts',
        description: 'Receive instant notifications about new leads, follow-ups, and important updates.',
        icon: EnvelopeIcon
    },
    {
        name: 'Real-time Analytics',
        description: 'Get insights into your sales performance with up-to-date analytics and reports.',
        icon: PresentationChartBarIcon
    },
    {
        name: 'CRM Integration',
        description: 'Seamlessly integrate with your existing CRM tools for a unified sales workflow.',
        icon: UserPlusIcon
    },
    {
        name: 'Customizable Templates',
        description: 'Tailor your sales pages with customizable templates to fit your unique brand and needs.',
        icon: RectangleGroupIcon
    },
    {
        name: 'Automated Backups',
        description: 'Ensure your data is always safe with automated backups and secure storage.',
        icon: CircleStackIcon
    },
    {
        name: 'Responsive Design',
        description: 'Reach your clients on any device with a mobile-friendly design',
        icon: DevicePhoneMobileIcon
    },
    {
        name: 'E2E Testing',
        description: 'Rest assured knowing that daily tests are verifying every front-end update.',
        icon: ClipboardDocumentIcon
    },
    {
        name: 'Speed and Performance',
        description: 'Experience lightning-fast loading times and smooth performance with Vue.',
        icon: BoltIcon
    },
    {
        name: 'SEO Optimization',
        description: 'Improve your search engine rankings with built-in SEO optimization tools.',
        icon: CogIcon
    },
    {
        name: 'LLM Integration',
        description: 'Sort your leads and respond accordingly with with automated responses.',
        icon: ChatBubbleLeftRightIcon
    },
    {
        name: 'Custom Integrations',
        description: 'Integrate with your favorite tools and services to streamline your workflow.',
        icon: WrenchScrewdriverIcon
    }

];
</script>

