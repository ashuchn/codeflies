@extends('layout')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                    <form action="{{ route('profile.save', ['id' => $user->id]) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                  <label for="name">Full name <span class="text-danger">*</span></label>
                                  <div class="input-group">
                                      <input type="text" name="name" id="name" class="form-control" placeholder="Full name" value="{{ $user->name }}" required>
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
                                  <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" placeholder="Email">
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
                                    <input type="text" name="mobile" id="mobile" maxlength="10" class="form-control" value="{{ $user->mobile }}" placeholder="Mobile" required>
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
                            </div>
                            <input type="submit" value="Update!" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection