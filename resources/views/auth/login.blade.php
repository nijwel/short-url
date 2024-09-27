@extends('layouts.app')

@section('content')
@push('css')

@endpush
<div class="wrapper-page">
    <div class="card card-pages">
        <div class="card-header bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> Sign In to <strong>ShortLink</strong> </h3>
        </div>

        @if(Session::get('error'))
             <div class="alert alert-danger alert-dismissible fade show">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 {{Session::get('error')}}
             </div>
        @elseif(Session::get('success'))
             <div class="alert alert-info alert-dismissible fade show">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <span class="text-secondary bold">{{Session::get('success')}}</span>
             </div>
        @endif
        <div class="card-body">
        <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="col-12">
                    <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror " name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email" autofocus>
                </div>
                @error('email')
                    <div class="alert text-danger p-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="col-12">
                    <input id="password" type="password"  class="form-control input-lg @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                </div>
                @error('email')
                    <div class="alert text-danger p-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <div class="col-12">
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox-signup" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-signup">
                            Remember me
                        </label>
                    </div>

                </div>
            </div>

            <div class="form-group text-center m-t-40">
                <div class="col-12">
                    <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>

            <div class="form-group row m-t-30">
                <div class="col-sm-7">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                    @endif
                </div>
                <div class="col-sm-5 text-right">
                    <a href="{{ route('register') }}">Create an account</a>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function(){
        $(".alert").delay(3000).fadeOut(2000);
      });
</script>
@endpush
@endsection
