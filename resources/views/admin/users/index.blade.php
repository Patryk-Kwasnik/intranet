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
                            <h3 class="box-title">{{ __('users.all_users') }} </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary mx-4 my-2" href="{{ route('users.create') }}"> {{ __('users.create') }}</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>{{ __('users.user') }} </th>
                                        <th>{{ __('users.email') }}</th>
                                        <th>{{ __('users.phone') }}</th>
                                        <th>{{ __('users.roles') }}</th>
                                        <th class="col-3">{{ __('system.options') }}</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <span class="badge rounded-pill bg-dark">{{ $v }}</span>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href =" {{ route('users.show',$user->id) }}" class= " btn btn-info"> <i class="fa fa-eye"></i> {{ __('system.preview') }} </a>
                                                <a href =" {{ route('users.edit',$user->id) }}" class= " btn btn-dark" ><i class="fa fa-pencil"></i> {{ __('system.edit') }} </a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline','class' => 'delete_row','id'=>$user->id, 'data-id'=> $user->id]) !!}
                                                {!! Form::submit(' Usuń', ['class' => ' btn btn-danger']) !!}
                                                {!! Form::close() !!}
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
    {!! $data->render() !!}
@endsection
