@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Product</h1>
    <a href="{{ route('product.create') }}" class="btn btn-primary">Create Product</a>
@stop

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="product-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Developer</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/buttons.bootstrap4.min.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'developer',
                        name: 'developer'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
                ]
            });
        });
    </script>
@stop
