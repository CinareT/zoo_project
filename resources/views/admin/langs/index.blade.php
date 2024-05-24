@extends('admin.layouts.master')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
    <a href="{{route('admin.langs.create')}}" class="btn btn-success">New Language</a>
</div>
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Code</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th class="w-auto">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->code}}</td>
                    <td>{{$model->country}}</td>
                    <td>
                        @if ($model->image)
                        <div class="image">
                            <img src="{{$model->image}}" alt="{{$model->country.' flag'}}">
                        </div>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('admin.langs.show', $model->id)}}" class="btn btn-info mb-1"><i
                                class="icon fas fa-info mr-2"></i> Info</a>
                        <a href="{{route('admin.langs.edit',$model->id)}}" class="btn btn-warning mb-1"><i
                                class="icon fas fa-edit mr-2"></i>
                            Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post"
                            action="{{route('admin.langs.destroy', $model->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="width: fit-content;" class="btn btn-outline-danger mb-1">
                                <i class="icon fas fa-trash mr-2"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Group</th>
                    <th>Key</th>
                    <th>Text</th>
                    <th class="w-auto">Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection