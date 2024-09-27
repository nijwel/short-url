@extends('layouts.app')

@section('content')
<div class="wrapper-page">
    <div class="card card-pages">

        <div class="card-header bg-img"> 
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
        </div> 
        <div class="card-body">
         <form method="post" action="{{ route('password.email') }}" class="text-center"> 
            @csrf

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @elseif(Session::get('status'))
                 <div class="alert alert-success alert-dismissible fade show">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                     <span>{{Session::get('status')}}</span>
                 </div>
            @else
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                Enter your <b>Email</b> and instructions will be sent to you!
            </div>
            @endif
            <div class="form-group m-b-0"> 
                <div class="input-group"> 
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email"  value="{{ old('email') }}" required autocomplete="off" autofocus>
                    <span class="input-group-append"> <button type="submit" class="btn btn-primary waves-effect waves-light">Reset</button> </span> 
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
            </div> 
            <div class="form-group m-t-30">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </form>

        </div>                                 
        
    </div>
</div>
@endsection
