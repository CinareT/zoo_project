@extends('admin.layouts.master')

@section('content')
    <form action="{{ route('admin.countries.store') }}" method="POST" class="row">
        @csrf
        <div class="col-lg-8">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        @foreach ($langs as $key => $lang)
                            <li class="nav-item">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code) text-danger border-top-danger @enderror"
                                    id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#{{ 'countries' . $lang->code }}" role="tab"
                                    aria-controls="custom-tabs-four-home"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ 'Title [' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                id="{{ 'countries' . $lang->code }}" role="tabpanel"
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
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="group">Code</label>
                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                            id="code" value="{{ old('code') }}">
                        @error('code')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </form>
@endsection
