<!doctype html>
<html lang="en">

    @include('layout._head')
<body id="body_container" style="font-family: Open Sans, sans-serif">
    <section  class="min-h-screen flex flex-col bg-gray-900 text-white">
        @include('layout._nav')

        @yield('content')

        @include('layout._footer')

    </section>

<x-users.success-message />

@yield('script')

</body>

</html>
