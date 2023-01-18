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
        <div class="actions mb-4">
            <a class="mb-2 btn btn-sm btn-primary w-100 d-table mx-auto extra-action"
                href="https://designrevision.com/downloads/shards-dashboard-lite/">
                <i class="material-icons">cloud</i> Download</a>
            <a class="mb-2 btn btn-sm btn-white w-100 d-table mx-auto extra-action"
                href="https://designrevision.com/docs/shards-dashboard-lite">
                <i class="material-icons">book</i> Documentation</a>
        </div>
        <div class="social-wrapper">
            <div class="social-actions">
                <h5 class="my-2">Help us Grow</h5>
                <div class="inner-wrapper">
                    <a class="github-button" href="https://github.com/DesignRevision/shards-dashboard"
                        data-icon="octicon-star" data-show-count="true"
                        aria-label="Star DesignRevision/shards-dashboard on GitHub">Star</a>
                    <!-- <iframe style="width: 91px; height: 21px;"src="https://yvoschaap.com/producthunt/counter.html#href=https%3A%2F%2Fwww.producthunt.com%2Fr%2Fp%2F112998&layout=wide" width="56" height="65" scrolling="no" frameborder="0" allowtransparency="true"></iframe> -->
                </div>
            </div>
            <div id="social-share" data-url="https://designrevision.com/downloads/shards-dashboard-lite/"
                data-text="🔥 Check out Shards Dashboard Lite, a free and beautiful Bootstrap 4 admin dashboard template!"
                data-title="share"></div>
            <div class="loading-overlay">
                <div class="spinner"></div>
            </div>
        </div>
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
            @yield('content')
        </div>
    </div>
    <div class="promo-popup animated">
        <a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
            <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> </a>
        <div class="pp-intro-bar"> Need More Templates?
            <span class="close">
                <i class="material-icons">close</i>
            </span>
            <span class="up">
                <i class="material-icons">keyboard_arrow_up</i>
            </span>
        </div>
        <div class="pp-inner-content">
            <h2>Shards Dashboard Pro</h2>
            <p>A premium & modern Bootstrap 4 admin dashboard template pack.</p>
            <a class="pp-cta extra-action" href="http://bit.ly/shards-dashboard-pro">Download</a>
        </div>
    </div>

    @include('admin.layouts.partials.scripts')

</body>

</html>
