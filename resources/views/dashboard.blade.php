@extends('layout')
@section('content')
{{-- put all the content inside content-wrapper class --}}
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <h1>Hello, {{ $user->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <a href="{{ route('profile') }}" class="small-box-footer">
                            <div class="info-box bg-gradient-info">
                                <span class="info-box-icon"><i class="far fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">My profile</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /.row -->
            </div> <!-- container fluid ends -->
        </div>
    </div>
@endsection

@section('script')
@endsection
