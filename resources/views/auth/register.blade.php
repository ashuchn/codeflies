<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Codeflies Register</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{url('assets/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="{{url('assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{url('assets/adminlte/dist/css/adminlte.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition register-page">
<div class="d-flex justify-content-center mt-4">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <b>Register a new user</b>
    </div>
    <div class="card-body">
      <ol class="text-danger">
        <li>Asterisk(*) marked field are mandatory</li>
        <li>Please do not include +91 or 0 before Mobile Number</li>
        <li>Accepted profile image dimension: 400 x 400 px</li>
      </ol>

      <form action="{{ route('register.post') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group row">
          <div class="col-md-6">
                <label for="name">Full name <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full name" value="{{ old('name') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
          </div>
          <div class="col-md-6">
            <label for="email">Email</label>
            <div class="input-group">
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>            
        </div>

        <div class="form-group row">
            <div class="col-md-6">
              <label for="mobile">Mobile <span class="text-danger">*</span></label>
              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                      +91
                  </div>
                </div>
                  <input type="text" name="mobile" id="mobile" maxlength="10" class="form-control" value="{{ old('mobile') }}" placeholder="Mobile" required>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-phone"></span>
                      </div>
                  </div>
              </div>
              @error('mobile')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <label for="password">Password <span class="text-danger">*</span></label>
              <div class="input-group">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                      </div>
                  </div>
              </div>
              @error('password')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
        </div>
    
        <div class="form-group row">
          <div class="col-md-6">
            <label for="pfp">Profile Image: <span class="text-danger">*</span></label>
            <div class="input-group">
                <input type="file" class="form-control" name="pfp" id="pfp" required accept="image/*">
            </div>
            @error('pfp')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
    </form>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- Bootstrap 4 -->
<script src="{{url('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('assets/adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
