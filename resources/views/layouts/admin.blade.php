@include('layouts.shared/main')

<head>

    @include('layouts.shared/title-meta', ['title' => $title])

    @yield('css')

    @include('layouts.shared/head-css')

</head>

<body>

    @include('layouts.shared/admin-topbar')

    @include('layouts.shared/admin-menu')

    <div class="w-full lg:ps-64">
        <div class="p-6 page-content">
            @include('layouts.shared/admin-page-title', ['title' => $title,'subtitle' => $subtitle])

            @yield('content')

        </div>
    </div>

    @include('layouts.shared/admin-footer')

    @include('layouts.shared/footer-scripts')

</body>

</html>