@extends('layouts.admin')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
                  <center><img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->image))? url('upload/admin_images/'.$adminData->image):url('adminPanel/images/avatar/no_av.jpg') }}" alt="Card image cap"> </center>
                    <div class="card-body">
                        <h4 class="card-title">Login : {{ $adminData->name }} </h4>
                        <hr>
                        <h4 class="card-title">Email: {{ $adminData->email }} </h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Edytuj profil</a>           
                        <a href="{{ route('change.password') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Zmień hasło</a>                    
                    </div>
                </div>
            </div>                                          
        </div> 
    </div>
</div>
@endsection 