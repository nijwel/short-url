@extends('layouts.app')

@section('content')
@push('css')

@endpush
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">
      <div class="wraper">
          <div class="row">
              <div class="col-sm-12">
                  <div class="bg-picture text-center" style="background-image:url('{{ asset('backend/') }}/assets/images/big/bg.jpg')">
                      <div class="bg-picture-overlay"></div>
                      <div class="profile-info-name">
                          <img src="{{ asset('backend/') }}/assets/images/users/avatar-1.jpg" class="thumb-lg rounded-circle img-thumbnail" alt="profile-image">
                          <h3 class="text-white">{{ Auth::user()->name }}</h3>
                      </div>
                  </div>
                  <!--/ meta -->
              </div>
          </div>
          <div class="row user-tabs">
              <div class="col-md-9 col-xl-6">
                  <ul class="nav nav-tabs tabs" role="tablist">
                      <li class="nav-item tab">
                          <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">
                              <span class="d-block d-sm-none"><i class="fa fa-home"></i></span>
                              <span class="d-none d-sm-block">Profile</span>
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">

                  <div class="tab-content profile-tab-content">
                      <div class="tab-pane show active" id="about" role="tabpanel" aria-labelledby="about-tab">

                          <div class="row">
                              <div class="col-lg-4">
                                  <!-- Personal-Information -->
                                  <div class="card card-default card-fill">
                                      <div class="card-header">
                                          <h3 class="card-title">Personal Information</h3>
                                      </div>
                                      <div class="card-body">
                                          <div class="about-info-p">
                                              <strong>Full Name</strong>
                                              <br>
                                              <p class="text-muted">{{ $data->name }}</p>
                                          </div>
                                          <div class="about-info-p">
                                              <strong>Mobile</strong>
                                              <br>
                                              <p class="text-muted">{{ $data->phone }}</p>
                                          </div>
                                          <div class="about-info-p">
                                              <strong>Email</strong>
                                              <br>
                                              <p class="text-muted">{{ $data->email }}</p>
                                          </div>
                                          <div class="about-info-p m-b-0">
                                              <strong>Location</strong>
                                              <br>
                                              <p class="text-muted">{{ $data->address }}</p>
                                          </div>
                                      </div>
                                  </div>
                                  <!-- Personal-Information -->
                              </div>

                              <div class="col-lg-8">
                                  <!-- Personal-Information -->
                                  <div class="card card-default card-fill">
                                      <div class="card-header">
                                          <h3 class="card-title">Update Profile</h3>
                                      </div>
                                      <div class="card-body">
                                          <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                          @csrf
                                              <div class="form-group">
                                                  <label for="FullName">Full Name</label>
                                                  <input type="text" placeholder="John Doe" id="FullName" value="{{ $data->name }}" name="name" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="Email">Email</label>
                                                  <input type="email" placeholder="first.last@example.com" value="{{ $data->email }}" name="email" id="Email" class="form-control">
                                              </div>
                                              <div class="row">
                                              	<div class="form-group col-lg-8">
                                              	    <label for="Username">Phone</label>
                                              	    <input type="text" placeholder="(123) 123 1234" value="{{ $data->phone }}" name="phone" id="phone" class="form-control">
                                              	</div>
                                              	<div class="form-group col-lg-4">
                                              	    <label for="designation">Designation</label>
                                              	    <input type="text" placeholder="Designation" value="{{ $data->designation }}" name="designation" id="designation" class="form-control">
                                              	</div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="RePassword">Address</label>
                                                  <input type="text" placeholder="Address" id="RePassword" value="{{ $data->address }}" name="address" class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="AboutMe">About Me</label>
                                                  <textarea style="height: 125px" name="about_me" id="AboutMe" class="form-control">{{ $data->about_me }}</textarea>
                                              </div>
                                              <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                                          </form>

                                      </div>
                                  </div>
                                  <!-- Personal-Information -->

                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
    </div>
      <!-- content -->

      <footer class="footer">
          2016 - 2019 © Moltran.
      </footer>

  </div>
</div>
@push('js')

@endpush
@endsection
