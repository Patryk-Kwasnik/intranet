@extends('layouts.admin')
@section('admin')

    <div class="container-full">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('roles.roles') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('roles.create') }}"> {{ __('system.create') }}</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>{{ __('system.nr') }}</th>
                                        <th>{{ __('system.name') }}</th>
                                        <th class="col-3">{{ __('system.options') }}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roles  as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td class="text-center">
                                                <a href ="{{ route('roles.show',$role->id) }}" class= " btn btn-info"> <i class="fa fa-pencil"></i> {{ __('system.preview') }} </a>
                                                @can('role-edit')
                                                    <a href =" {{ route('roles.edit',$role->id) }}" class= " btn btn-dark" ><i class="fa fa-pencil"></i> {{ __('system.edit') }}  </a>
                                                @endcan
                                                @can('role-delete')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline','class' => 'delete_row','id'=>$role->id, 'data-id'=> $role->id]) !!}
                                                    {!! Form::submit(' Usuń', ['class' => ' btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.end col-12 -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
