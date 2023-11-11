@extends('admin.layouts.app')

@section('content')
    <style>


        div.dataTables_wrapper div.dataTables_filter {
            display: inline-block;
            float: right;
            margin: 5px;
        }

        div.dataTables_length {
            display: inline-block;
            margin: 5px 20px;
        }
    </style>
    <div class="main-content-container container-fluid px-4">
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Posts</span>
                <h3 class="page-title">Blog Website</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.13.1/b-2.3.3/datatables.min.js"></script>
    <script>
        jQuery(function() {
            jQuery('#posts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.posts.index') !!}',
                columns: [{
                        data: 'post_title',
                        name: 'post_title'
                    },
                    {
                        data: 'post_author',
                        name: 'post_author'
                    },
                    {
                        data: 'post_views',
                        name: 'post_views'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                scrollY: '50vh',
                scrollCollapse: true,
                // dom: 'Blfr<"#filterJenisPasienSelect">tip',
                dom: 'Blfrtip',
                // button with livewire action
                buttons: [{
                    text: 'Postingan Baru',
                    action: function(e, dt, node, config) {
                        window.location.href = "{{ route('admin.posts.create') }}";
                    }
                }],
            });
        });
    </script>
@endpush
