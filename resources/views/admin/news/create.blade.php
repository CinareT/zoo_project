@extends('admin.layouts.master')

@push('js')
    <script src="{{ asset('admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(window).on('load', function() {
            $(function() {
                bsCustomFileInput.init();
            });
            $(".custom-file-input").change(function(event) {
                if (event.target.files[0]) {
                    var tmppath = URL.createObjectURL(event.target.files[0]);
                    $("." + $(this).attr('id') + " img").attr(
                        "src",
                        URL.createObjectURL(event.target.files[0])
                    );
                } else {
                    $("." + $(this).attr('id') + " img").attr("src", '');
                }
            });
        });
    </script>
@endpush

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('admin.news.store') }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                @foreach ($langs as $key => $lang)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code) text-danger border-top-danger @enderror"
                                            id="custom-tabs-four-home-tab" data-toggle="pill"
                                            href="#{{ 'news' . $lang->code }}" role="tab"
                                            aria-controls="custom-tabs-four-home"
                                            aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ 'News [' . strtoupper($lang->code) . ']' }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                @foreach ($langs as $key => $lang)
                                    <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                        id="{{ 'news' . $lang->code }}" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title.{{ $lang->code }}">Title</label>
                                                <input type="text"
                                                    class="form-control  @error('title.' . $lang->code) is-invalid @enderror"
                                                    id="title.{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                                    value="{{ old('title' . '.' . $lang->code) }}">
                                                @error('title.' . $lang->code)
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="description.{{ $lang->code }}">Description</label>
                                                <textarea class="form-control @error('description.' . $lang->code) is-invalid @enderror"
                                                    id="description.{{ $lang->code }}" name="description[{{ $lang->code }}]">{{ old('description' . '.' . $lang->code) }}</textarea>
                                                @error('description.' . $lang->code)
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date"
                                    class="form-control  @error('date') is-invalid @enderror" id="date"
                                    value="{{ old('date') }}">
                                @error('date')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h4>Image Big</h4>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_big_url" name="img_big_url">

                                    <label class="custom-file-label" for="img_big_url">Choose file</label>

                                    @error('img_big_url')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="fb_link">Facebook Link</label>
                                <input type="text" name="fb_link"
                                    class="form-control @error('fb_link') is-invalid @enderror" id="fb_link"
                                    value="{{ old('fb_link') }}">
                                @error('fb_link')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tw_link">Twitter Link</label>
                                <input type="text" name="tw_link"
                                    class="form-control @error('tw_link') is-invalid @enderror" id="tw_link"
                                    value="{{ old('tw_link') }}">
                                @error('tw_link')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h4>Image</h4>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="img_url" name="img_url">

                                    <label class="custom-file-label" for="img_url">Choose file</label>

                                    @error('img_url')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="img_big_url">
                        <img src="" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="img_url">
                        <img src="" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
