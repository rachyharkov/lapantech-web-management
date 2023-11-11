<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
        content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">

    @include('admin.layouts.partials.styles')

</head>

<body class="h-100">
    <div class="color-switcher animated">
        <h5>Accent Color</h5>
        <ul class="accent-colors">
            <li class="accent-primary active" data-color="primary">
                <i class="material-icons">check</i>
            </li>
            <li class="accent-secondary" data-color="secondary">
                <i class="material-icons">check</i>
            </li>
            <li class="accent-success" data-color="success">
                <i class="material-icons">check</i>
            </li>
            <li class="accent-info" data-color="info">
                <i class="material-icons">check</i>
            </li>
            <li class="accent-warning" data-color="warning">
                <i class="material-icons">check</i>
            </li>
            <li class="accent-danger" data-color="danger">
                <i class="material-icons">check</i>
            </li>
        </ul>
        <div class="close">
            <i class="material-icons">close</i>
        </div>
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
        <i class="material-icons">settings</i>
    </div>
    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.partials.sidebar')
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                @include('admin.layouts.partials.navbar')
                @yield('content')
                @include('admin.layouts.partials.footer')
            </main>
        </div>
    </div>

    @include('admin.layouts.partials.modals')
    @include('admin.layouts.partials.scripts')

</body>

</html>
