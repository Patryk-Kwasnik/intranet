@extends('layouts.admin')
@section('admin')

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Zmień hasło </h4><br><br>         
                        <form method="post" action="{{ route('update.password') }}" >
                                @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Stare hasło</label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" class="form-control" type="password" id="oldpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Nowe hasło</label>
                                <div class="col-sm-10">
                                <input name="newpassword" class="form-control" type="password" id="newpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Potwierdź hasło</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password" id="confirm_password">
                                </div>
                            </div>
              
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Zmień hasło">
                        </form>    
                    </div>
                </div>
            </div> <!-- end col -->
        </div>  
    </div>
</div>
 
@endsection 