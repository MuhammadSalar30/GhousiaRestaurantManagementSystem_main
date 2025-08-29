@include('layouts.shared/main')

<head>
    @include('layouts.shared/title-meta', ['title' => $title])

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')

    @include('layouts.shared/head-css')
</head>

<body>

    @include('layouts.shared/navbar')

    @include('layouts.shared.add-to-cart-toast')

    @yield('content')

    @include('layouts.shared/footer')

    @include('layouts.shared/footer-scripts')

</body>

</html>
