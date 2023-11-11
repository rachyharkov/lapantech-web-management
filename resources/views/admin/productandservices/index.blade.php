@extends('admin.layouts.app')

@section('content')
    <table class="table table-striped table-bordered" id="posts-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Author</th>
                <th>View</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection

@push('js')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/datatables.min.js"></script>
    <script>
        jQuery(function() {
            jQuery('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.posts.index') !!}',
                columns: [
                    { data: 'post_title', name: 'post_title' },
                    { data: 'post_author', name: 'post_author' },
                    { data: 'post_views', name: 'post_views' },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                scrollY:'20vh',
                scrollCollapse: true,
                paging: false
            });
        })
    </script>
@endpush
