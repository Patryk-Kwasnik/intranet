@extends('layouts.admin')
@section('admin')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('system.edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('newsCategory.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {{ __('system.error_input') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::model($category, ['method' => 'PATCH','route' => ['newsCategory.update', $category->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>{{ __('news.category_name') }}:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>{{ __('news.category_parent') }}:</strong>
                    {!! Form::select('id_parent', $categories, $category->id_parent , array('class' => 'form-control')) !!}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection
