@extends('admin.layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Language Line Create
                    </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <form action="{{ route('language_line.store') }}" method="POST" class="row">
            @csrf
            <div class="col-lg-8">
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{ $key === 0 ? 'active' : '' }}" id="custom-tabs-four-home-tab"
                                        data-toggle="pill" href="#{{ 'language_line' . $lang->code }}" role="tab"
                                        aria-controls="custom-tabs-four-home"
                                        aria-selected="{{ $key === 0 ? 'true' : 'false' }}">Home</a>
                                </li>
                            @endforeach

                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill"
                                    href="#custom-tabs-four-settings" role="tab"
                                    aria-controls="custom-tabs-four-settings" aria-selected="false">Settings</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                                <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}"
                                    id="{{ 'language_line' . $lang->code }}" role="tabpanel"
                                    aria-labelledby="custom-tabs-four-home-tab">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="ttext">Text</label>
                                            <input type="text" class="form-control" id="text"
                                                value="{{ old('language_line' . '.' . $lang->code) }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                                ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur
                                adipiscing
                                elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
                                Curae;
                                Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus
                                ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc
                                euismod pellentesque diam.
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                aria-labelledby="custom-tabs-four-messages-tab">
                                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat
                                augue
                                id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem,
                                ac
                                tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus
                                tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet
                                sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum
                                gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt
                                eleifend
                                ac ornare magna.
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel"
                                aria-labelledby="custom-tabs-four-settings-tab">
                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                                turpis
                                ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate.
                                Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec
                                interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at
                                consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst.
                                Praesent imperdiet accumsan ex sit amet facilisis.
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </div>
@endsection