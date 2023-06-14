@extends('layouts.admin')
@section('admin')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> {{ __('system.preview') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('newsCategory.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('system.name') }}:</strong>
                    {{ $category->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ __('news.category_parent') }}:</strong>
                    @if(!empty($category->id_parent))
                        <label class="label label-success">{{ $category->name_parent }}</label>
                    @endif
                </div>
            </div>
        </div>
@endsection
