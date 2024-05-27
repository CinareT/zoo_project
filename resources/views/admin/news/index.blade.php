@extends('admin.layouts.master')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush

@section('content')
    <div class="text-right mb-3">
        <a href="{{ route('admin.news.create') }}" class="btn btn-success">New News</a>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Image Big</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->title }}</td>
                            <td>{{ $model->date }}</td>
                            <td>{{ $model->description }}</td>



                            <td>{{ $model->email }}</td>
                            <td>
                                @if ($model->img_big_url)
                                    <div class="image">
                                        <img src="{{ $model->img_big_url }}"
                                            alt="{{ $model->img_big_url . ' img_big_url' }}">
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if ($model->img_url)
                                    <div class="image">
                                        <img src="{{ $model->img_url }}" alt="{{ $model->img_url . ' img_url' }}">
                                    </div>
                                @endif
                            </td>

                            <td class="text-right">
                                <a href="{{ route('admin.news.show', $model->id) }}" class="btn btn-info mb-1"><i
                                        class="icon fas fa-info mr-2"></i> Info</a>
                                <a href="{{ route('admin.news.edit', $model->id) }}" class="btn btn-warning mb-1"><i
                                        class="icon fas fa-edit mr-2"></i> Edit</a>
                                <form onsubmit="return confirm('Are you sure?')" method="post"
                                    action="{{ route('admin.news.destroy', $model->id) }}" class="d-inline-block">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mb-1"><i
                                            class="icon fas fa-trash mr-2"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Image big</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
