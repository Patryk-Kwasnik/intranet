@extends('layouts.admin')
@section('admin')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ __('system.edit') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tasks.index') }}"> {{ __('system.back') }}</a>
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
        {!! Form::model($task, ['method' => 'PATCH','route' => ['tasks.update', $task->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    {{  Form::label('name', __('tasks.tasks_name'))  }}
                    {!! Form::text('name', $task->name, array('placeholder' =>  __('tasks.tasks_name'),'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>{{ __('tasks.status') }}:</strong>
                    {!! Form::select('status', $statuses, $task->status, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>{{ __('tasks.priority') }}:</strong>
                    {!! Form::select('priority', $priorities, $task->priority, array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>{{ __('tasks.user_assigned') }}:</strong>
                    {!! Form::select('id_user_assigned', $employees, $task->id_user_assigned, array('class' => 'form-control')) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>{{ __('tasks.start_date') }}:</strong>
                    {{ Form::input('dateTime-local', 'start_date', $task->start_date, [ 'class' => 'form-control']) }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>{{ __('tasks.end_date') }}:</strong>
                    {{ Form::input('dateTime-local', 'end_date', $task->end_date, [ 'class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="form-group">
                <strong>{{ __('tasks.tasks_text') }}:</strong>
                {!! Form::textarea('text', $task->text, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
            <button type="submit" class="btn btn-primary">{{ __('system.save') }}</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
