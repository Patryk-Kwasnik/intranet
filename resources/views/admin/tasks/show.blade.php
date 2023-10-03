@extends('layouts.admin')
@section('admin')
    <div class="box-content p-4">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> {{ __('system.preview') }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('tasks.index') }}"> {{ __('system.back') }}</a>
                </div>
            </div>
        </div>
        <div class="box p-4">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('system.name') }}:</strong>
                        {{ $task->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('tasks.status') }}:</strong>
                        @if(!empty($task->status))
                            <label class="label label-success">{{ $statuses[$task->status] }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('tasks.priority') }}:</strong>
                        @if(!empty($task->priority))
                            <label class="label label-success">{{ $priorities[$task->priority] }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('tasks.user_assigned') }}:</strong>
                        @if(!empty($task->id_user_assigned))
                            <label class="label label-success">{{ $employees[$task->id_user_assigned] }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('tasks.start_date') }}:</strong>
                        {{ $task->start_date }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('tasks.end_date') }}:</strong>
                        {{ $task->end_date }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ __('tasks.tasks_text') }}:</strong>
                        {{ $task->text }}
                    </div>
                </div>
            </div>

@endsection
