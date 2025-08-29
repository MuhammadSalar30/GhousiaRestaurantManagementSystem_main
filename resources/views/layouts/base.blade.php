@include('layouts.shared/main')

<head>
    @include('layouts.shared/title-meta', ['title' => $title])

    @yield('css')

    @include('layouts.shared/head-css')
</head>

<body>

    @yield('content')

    @include('layouts.shared/back-to-top')

    @include('layouts.shared/footer-scripts')

</body>

</html>