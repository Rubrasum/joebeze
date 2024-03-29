<title>Joe Betbeze Dev Blog</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net" />
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script src="https://kit.fontawesome.com/90fd230ab0.js" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>
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
