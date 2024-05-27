@extends('admin.layouts.master')

@section('content')
    <form action="{{ route('admin.news.update', $model->id) }}" method="POST" class="row">
        @csrf
        @method('PATCH')
        <div class="col-lg-8">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        @foreach ($langs as $key => $lang)
                            <li class="nav-item">
                                <a class="nav-link {{ $key === 0 ? 'active' : '' }} @error('title.' . $lang->code) text-danger border-top-danger @enderror"
                                    id="custom-tabs-four-home-tab" data-toggle="pill" href="#{{ 'news' . $lang->code }}"
                                    role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="{{ $key === 0 ? 'true' : 'false' }}">{{ 'Title [' . strtoupper($lang->code) . ']' }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" id="{{ 'news' . $lang->code }}"
                                role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title.{{ $lang->code }}">Title</label>
                                        <input type="text"
                                            class="form-control  @error('title.' . $lang->code) is-invalid @enderror"
                                            id="title.{{ $lang->code }}" name="title[{{ $lang->code }}]"
                                            value="{{ old('title' . '.' . $lang->code, isset($model->getTranslations('title')[$lang->code]) ? $model->getTranslations('title')[$lang->code] : '') }}">
                                        @error('title.' . $lang->code)
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description.{{ $lang->code }}">Description</label>
                                        <textarea class="form-control @error('description.' . $lang->code) is-invalid @enderror"
                                            id="description.{{ $lang->code }}" name="description[{{ $lang->code }}]">{{ old('description' . '.' . $lang->code, isset($model->getTranslations('description')[$lang->code]) ? $model->getTranslations('description')[$lang->code] : '') }}</textarea>
                                        @error('description.' . $lang->code)
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email.{{ $lang->code }}">Email</label>
                                        <input type="email"
                                            class="form-control @error('email.' . $lang->code) is-invalid @enderror"
                                            id="email.{{ $lang->code }}" name="email[{{ $lang->code }}]"
                                            value="{{ old('email' . '.' . $lang->code, isset($model->getTranslations('email')[$lang->code]) ? $model->getTranslations('email')[$lang->code] : '') }}">
                                        @error('email.' . $lang->code)
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
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                            id="date" value="{{ old('date', $model->date) }}">
                        @error('date')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_big_url">Image Big URL</label>
                        <input type="text" name="img_big_url"
                            class="form-control @error('img_big_url') is-invalid @enderror" id="img_big_url"
                            value="{{ old('img_big_url', $model->img_big_url) }}">
                        @error('img_big_url')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fb_link">Facebook Link</label>
                        <input type="text" name="fb_link" class="form-control @error('fb_link') is-invalid @enderror"
                            id="fb_link" value="{{ old('fb_link', $model->fb_link) }}">
                        @error('fb_link')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tw_link">Twitter Link</label>
                        <input type="text" name="tw_link" class="form-control @error('tw_link') is-invalid @enderror"
                            id="tw_link" value="{{ old('tw_link', $model->tw_link) }}">
                        @error('tw_link')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img_url">Image URL</label>
                        <input type="text" name="img_url" class="form-control @error('img_url') is-invalid @enderror"
                            id="img_url" value="{{ old('img_url', $model->img_url) }}">
                        @error('img_url')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
