@extends('layouts.admin')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edycja profilu</h4>
                        
                        <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Login</label>
                            <div class="col-sm-10">
                                <input name="name" class="form-control" type="text" value="{{ $editData->name }}"  id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="email" class="form-control" type="text" value="{{ $editData->email }}"  id="example-text-input">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image </label>
                            <div class="col-sm-10">
                        <input name="image" class="form-control" type="file"  id="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                            <div class="col-sm-6">
                                <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->image))? url('upload/admin_images/'.$editData->image):url('adminPanel/images/avatar/no_av.jpg') }}" alt="Card image cap">
                            </div>
                        </div>

                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Aktualizuj">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection 