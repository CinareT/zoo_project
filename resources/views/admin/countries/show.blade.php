@extends('admin.layouts.master')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Details</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($model->getFillable() as $field)
            @if (is_array($model->getAttribute($field)))
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($model->getAttribute($field) as $key=>$value)
                            <div class="col-sm-4">
                                <div class="position-relative p-3 bg-gray" style="height: 180px">
                                    <div class="ribbon-wrapper ribbon-xl">
                                        <div class="ribbon bg-warning text-lg">
                                            {{$key}}
                                        </div>
                                    </div>
                                    {{$value}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-6">
                <div class="callout callout-info">
                    <h5 class="text-info">{{ ucfirst(str_replace('_', ' ', $field)) }}</h5>
                    <p>
                        {{$model->getAttribute($field)}}
                    </p>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection