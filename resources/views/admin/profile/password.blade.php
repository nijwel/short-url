@extends('layouts.app')

@section('content')
@push('css')

@endpush
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
        	<!-- Page-Title -->
        	<div class="row">
        	    <div class="col-sm-12">
        	        <h4 class="pull-left page-title">Password</h4>
        	        <ol class="breadcrumb pull-right">
        	            <li><a href="#">Home</a></li>
        	            <li class="active">Password change</li>
        	        </ol>
        	    </div>
        	</div>
        	@if(Session::get('error'))
        	     <div class="alert alert-danger alert-dismissible fade show">
        	         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        	             <span aria-hidden="true">&times;</span>
        	         </button>
        	         {{Session::get('error')}}
        	     </div>
        	 @endif
        	<div class="col-xl-12">
        	    <div class="card">
        	        <div class="card-header"><h3 class="card-title">Password change</h3></div>
        	        <div class="card-body">
        	            <form class="form-horizontal" action="{{ route('update.password') }}" method="post">
        	            	@csrf
        	                <div class="form-group">
        	                    <div class="col-md-12 offset-md-12 row">
        	                        <div class="col-md-4">
        	                        	<div class="input-group m-t-10">
        	                        	    <input type="password" id="old_pass" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password">
        	                        	    <div class="input-group-append">
        	                        	        <span class="input-group-text"><a class="text-dark old-pass" href="javascript:void(0)"><i class="fa fa-eye-slash"></i></a></span>
        	                        	    </div>
        	                        	</div>
        	                        	@error('old_password')
        	                        	    <div class=" text-danger p-2">{{ $message }}</div>
        	                        	@enderror
        	                        </div>
        	                        <div class="col-md-4">
        	                        	<div class="input-group m-t-10">
        	                        	    <input type="password" id="new_pass" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password">
        	                        	    <div class="input-group-append">
        	                        	        <span class="input-group-text"><a class="text-dark new-pass" href="javascript:void(0)"><i class="fa fa-eye-slash"></i></a></span>
        	                        	    </div>
        	                        	</div>
        	                        	@error('new_password')
        	                        	    <div class=" text-danger p-2">{{ $message }}</div>
        	                        	@enderror
        	                        </div>
        	                        <div class="col-md-4">
        	                        	<div class="input-group m-t-10">
        	                        	    <input type="password" id="confirm_pass" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password">
        	                        	    <div class="input-group-append">
        	                        	        <span class="input-group-text"><a class="text-dark confirm-pass" href="javascript:void(0)"><i class="fa fa-eye-slash"></i></a></span>
        	                        	    </div>
        	                        	</div>
        	                        	@error('confirm_password')
        	                        	    <div class=" text-danger p-2">{{ $message }}</div>
        	                        	@enderror
        	                        </div>
        	                    </div>
        	                </div> <!-- form-group -->
        	                <div class="mt-5">
        	                	<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
        	                </div>
        	            </form>
        	       </div> <!-- card-body -->
        	    </div> <!-- card -->
        	</div> <!-- col -->
        </div>
        <!-- content -->

        <footer class="footer">
            2016 - 2019 © Moltran.
        </footer>

    </div>
</div>
@push('js')
	<script>
		$('.old-pass').click(function(){
			var x = $('#old_pass').prop("type");

			if(x === "password"){
				$(this).html('<i class="fa fa-eye"></i>');
				$('#old_pass').attr('type','text');
			}else{
				$(this).html('<i class="fa fa-eye-slash"></i>');
				$('#old_pass').attr('type','password');
			}	
		});

		$('.new-pass').click(function(){
			var x = $('#new_pass').prop("type");
			
			if(x === "password"){
				$(this).html('<i class="fa fa-eye"></i>');
				$('#new_pass').attr('type','text');
			}else{
				$(this).html('<i class="fa fa-eye-slash"></i>');
				$('#new_pass').attr('type','password');
			}	
		});

		$('.confirm-pass').click(function(){
			var x = $('#confirm_pass').prop("type");
			
			if(x === "password"){
				$(this).html('<i class="fa fa-eye"></i>');
				$('#confirm_pass').attr('type','text');
			}else{
				$(this).html('<i class="fa fa-eye-slash"></i>');
				$('#confirm_pass').attr('type','password');
			}	
		});

		$(document).ready(function(){
		    $(".alert").delay(3000).fadeOut(500);
		  });
	</script>
@endpush
@endsection