<!doctype html>
<html lang="en">

    @include('layout._head')
<body style="font-family: Open Sans, sans-serif">
    <section>
        @include('layout._nav')

        @yield('content')

        @include('layout._footer')

    </section>

<x-users.success-message />

</body>

</html>
