<!DOCTYPE html>
<html>

<head>

    <title>Lead Management</title>
    <script>
    window.Laravel = {
        userId: @json(auth()->id())
    };
</script>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

@include('components.navbar')

<div class="container-fluid">
    <div id="live-alert-container" class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">

    </div>
    <div class="row">

        <div class="col-md-2">
            

            @include('components.sidebar')

        </div>

        <div class="col-md-10 py-4">

            @yield('content')

        </div>

    </div>

</body>

</html>