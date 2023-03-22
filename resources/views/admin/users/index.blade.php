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
                            <h3 class="box-title">All User </h3>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('users.create') }}"> Back</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Uźytkownik </th>
                                        <th>Email</th>
                                        <th>Telefon</th>
                                        <th>Uprawnienia</th>
                                        <th>Opcje</th>

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
                                                <a href =" {{ route('users.show',$user->id) }}" class= "btn-sm btn btn-info"> <i class="fa fa-pencil"></i> Podgląd </a>
                                                <a href =" {{ route('users.edit',$user->id) }}" class= "btn-sm btn btn-dark" ><i class="fa fa-pencil"></i> Edycja </a>
                                                <a href =" {{ route('users.destroy', $user->id) }}" class= "btn-sm btn btn-danger" id="delete"><i class="fa fa-trash"></i> Usuń </a>
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
