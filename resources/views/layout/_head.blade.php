<title>Joe Betbeze Dev Blog</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Fonts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- TODO REMOVE INLINE STYLES --}}
{{-- TODO ORGANIZE NAVBAR MORE EFFICIENTLY - TEST AGAINST SPEED THINGIES--}}
<script>
    // hide the page body_container id element until its loaded
    window.onload = function() {
        document.getElementById('body_container').style.visibility = 'visible';
    }
</script>

<style>
    html {
        scroll-behavior: smooth
    }
    #body_container {
        visibility: hidden;
    }
</style>
