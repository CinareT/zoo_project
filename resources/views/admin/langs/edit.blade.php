@extends('admin.layouts.master')

@push('js')
<script src="{{asset('admin/assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script>
    $(window).on('load', function() {
        $(function() {
            bsCustomFileInput.init();
        });
        if ($(".custom-file-input")) {
            $(".custom-file-input").val('');
        }
        $(".custom-file-input").change(function(event) {
            if (event.target.files[0]) {
                var tmppath = URL.createObjectURL(event.target.files[0]);
                $(".image-box img").attr(
                    "src",
                    URL.createObjectURL(event.target.files[0])
                );
            } else {
                $(".image-box img").attr("src", '');
            }
        });
    });
</script>
@endpush
@section('content')
<form action="{{ route('admin.langs.update', $model->id) }}" method="POST" class="row" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-body">
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{old('code',$model->code)}}">
                    @error('code')
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="country" value="{{old('country',$model->country)}}">
                    @error('country')
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="image-box">
            <img src="{{$model->image??''}}" alt="" class="img-fluid">
        </div>
    </div>
</form>
@endsection