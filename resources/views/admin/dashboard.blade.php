@extends('admin.layouts.app')

@section('content')
    <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        @include('admin.layouts.partials.navbar')
        <livewire:admin.dashboard />
        @include('admin.layouts.partials.footer')
    </main>
@endsection
