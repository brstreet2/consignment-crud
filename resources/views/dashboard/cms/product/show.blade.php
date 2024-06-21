@extends('adminlte::page')

@section('title', 'Show Banner')

@section('content_header')
    <h1>Show Banner</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $banner->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                {{ $banner->content }}
            </div>
        </div>
    </div>
@stop
