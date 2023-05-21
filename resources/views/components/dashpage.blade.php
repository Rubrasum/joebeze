@props(['heading'])

<section class="py-8 min-w-4xl max-w-screen-lg w-4/5 mx-auto bg-gray-900 text-white">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4 text-white">Options</h4>

            <ul>
                <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-white border-white bg-gray-700' : 'text-gray-300 border-gray-300 bg-gray-900' }}
                    hover:text-white hover:border-white inline-block mb-2 mr-4 rounded-lg border-2">
                    <li class="px-4 py-2">All Posts</li>
                </a>

                <a href="/admin/posts/create" class="
                    {{ request()->is('admin/posts/create') ? 'text-white border-white bg-gray-700' : 'text-gray-300 border-gray-300 bg-gray-900' }}
                     hover:text-white hover:border-white inline-block mb-2 mr-4 rounded-lg border-2">
                    <li class="px-4 py-2">New Post</li>
                </a>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>




