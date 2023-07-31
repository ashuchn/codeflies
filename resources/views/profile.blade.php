@extends('layout')
@section('content')
<div class="content-wrapper">
<div class="content-header">
<div class="container">
    <div class="row">

    
    <div class="col-md-12">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ asset("storage/".$user->profile_picture) }}"
                   alt="User profile picture">
            </div>
    
            <h3 class="profile-username text-center">{{ $user->name }}</h3>

    
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Email</b> <a class="float-right">{{ $user->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Mobile</b> <a class="float-right">{{ $user->mobile }}</a>
              </li>
            </ul>
    
            <a href="{{ route('profile.update', ['id' => $user->id]) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    
        
        <!-- /.card -->
    </div>
</div>
</div>
</div>
</div>
@endsection

@section('script')
@endsection