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
        <a href="{{ route('admin.settings.create') }}" class="btn btn-success">New Setting</a>
    </div>
    <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="display: flex; flex-wrap:wrap; overflow-x: auto;">
                    <tr>
                        <th style="width: 10px">Id</th>
                        <th style="white-space: nowrap; width: 50px;">Logo Img</th>
                        <th style="white-space: nowrap; width: 50px;">Tiktok Link</th>
                        <th style="white-space: nowrap; width: 50px;">Insta Link</th>
                        <th>Live Link</th>
                        <th>Sale Link</th>
                        <th>Info Title</th>
                        <th>Info Subtitle</th>
                        <th>Info Desc</th>
                        <th>Banner Img</th>
                        <th>Banner Link</th>
                        <th>Services Home Title</th>
                        <th>Services Subtitle</th>
                        <th>Gallery Home Title</th>
                        <th>Gallery Subtitle</th>
                        <th>News Home Title</th>
                        <th>News Subtitle</th>
                        <th>Footer Title</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th style="white-space: nowrap; width: 50px;">Email</th>
                        <th style="white-space: nowrap; width: 50px;">Work Time</th>
                        <th>Copy Write</th>
                        <th>About Bg Img</th>
                        <th>About Title</th>
                        <th>About Old Desc</th>
                        <th>About New Desc</th>
                        <th>About Old img</th>
                        <th>About New Img</th>
                        <th>Services Bg Img</th>
                        <th>Services Title</th>
                        <th>Services desc</th>
                        <th>News Title</th>
                        <th>News Bg Img</th>
                        <th>Suggestion Title</th>
                        <th>Suggestion Bg Img</th>
                        <th>Rules Title</th>
                        <th>Rules Bg Img</th>
                        <th>Rules Desc</th>
                        <th>Education Bg Img</th>
                        <th>Education Title</th>
                        <th>Education Desc</th>
                        <th>Breeding Title</th>
                        <th>Breeding Desc</th>
                        <th>Breeding Bg Img</th>
                        <th>Faq Title</th>
                        <th>Faq Bg Img</th>
                        <th>Galery Title</th>
                        <th>Contact Title</th>
                        <th>Contact Bg Img</th>
                        <th>Longitute</th>
                        <th>Latitude</th>
                        <th>Marker Path</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td>{{ $model->id }}</td>
                            <td>{{ $model->logo_img }}</td>
                            <td>{{ $model->tiktok_link }}</td>
                            <td>{{ $model->insta_link }}</td>
                            <td>{{ $model->live_link }}</td>
                            <td>{{ $model->sale_link }}</td>
                            <td>{{ $model->info_title }}</td>
                            <td>{{ $model->info_subtitle }}</td>
                            <td>{{ $model->info_desc }}</td>
                            <td>{{ $model->banner_img }}</td>
                            <td>{{ $model->banner_title }}</td>
                            <td>{{ $model->banner_link }}</td>
                            <td>{{ $model->services_home_title }}</td>
                            <td>{{ $model->services_subtitle }}</td>
                            <td>{{ $model->gallery_home_title }}</td>
                            <td>{{ $model->gallery_subtitle }}</td>
                            <td>{{ $model->news_home_title }}</td>
                            <td>{{ $model->news_subtitle }}</td>
                            <td>{{ $model->footer_title }}</td>
                            <td>{{ $model->address }}</td>
                            <td>{{ $model->phone }}</td>
                            <td>{{ $model->email }}</td>
                            <td>{{ $model->work_time }}</td>
                            <td>{{ $model->copy_write }}</td>
                            <td>{{ $model->about_bg_img }}</td>
                            <td>{{ $model->about_title }}</td>
                            <td>{{ $model->about_old_desc }}</td>
                            <td>{{ $model->about_new_desc }}</td>
                            <td>{{ $model->about_old_img }}</td>
                            <td>{{ $model->about_new_img }}</td>
                            <td>{{ $model->services_bg_img }}</td>
                            <td>{{ $model->services_title }}</td>
                            <td>{{ $model->services_desc }}</td>
                            <td>{{ $model->news_title }}</td>
                            <td>{{ $model->news_bg_img }}</td>
                            <td>{{ $model->suggestion_title }}</td>
                            <td>{{ $model->suggestion_bg_img }}</td>
                            <td>{{ $model->rules_title }}</td>
                            <td>{{ $model->rules_bg_img }}</td>
                            <td>{{ $model->rules_desc }}</td>
                            <td>{{ $model->education_bg_img }}</td>
                            <td>{{ $model->education_title }}</td>
                            <td>{{ $model->education_desc }}</td>
                            <td>{{ $model->breeding_title }}</td>
                            <td>{{ $model->breeding_desc }}</td>
                            <td>{{ $model->breeding_bg_img }}</td>
                            <td>{{ $model->faq_title }}</td>
                            <td>{{ $model->faq_bg_img }}</td>
                            <td>{{ $model->galery_title }}</td>
                            <td>{{ $model->contact_title }}</td>
                            <td>{{ $model->contact_bg_img }}</td>
                            <td>{{ $model->longitude }}</td>
                            <td>{{ $model->latitude }}</td>
                            <td>{{ $model->marker_path }}</td>

                            <td class="text-right">
                                <a href="{{ route('admin.settings.show', $model->id) }}" class="btn btn-info mb-1"><i
                                        class="icon fas fa-info mr-2"></i> Info</a>
                                <a href="{{ route('admin.settings.edit', $model->id) }}" class="btn btn-warning mb-1"><i
                                        class="icon fas fa-edit mr-2"></i>
                                    Edit</a>
                                <form onsubmit="return confirm('Are you sure?')" method="post"
                                    action="{{ route('admin.settings.destroy', $model->id) }}" class="d-inline-block">
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
                        <th>Title</th>
                        <th>Code</th>
                        <th class="w-auto">Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
