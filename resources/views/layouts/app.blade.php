<!DOCTYPE html>
<html>

<head>

    <title>Lead Management</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

@include('components.navbar')

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2">
            

            @include('components.sidebar')

        </div>

        <div class="col-md-10 py-4">

            @yield('content')

        </div>

    </div>

</div>

</body>

</html>