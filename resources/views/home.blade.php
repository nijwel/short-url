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
                    <h4 class="pull-left page-title">Welcome !</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('home') }}">Shortner</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--Flash message--->
             @if(Session::get('success'))
                  <div class="alert alert-success alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      {{Session::get('success')}}
                  </div>
              @elseif ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <p> <span class="font-weight-bolder h5">Error ! </span> Somthing went wrong !</p>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </div>
              @endif
            <!--/End Flash message--->
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-info waves-effect waves-light float-right" data-toggle="modal" data-target=".bs-example-modal-lg">Generate Shorten Link</button>
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-bordered table-sm table-hover table-striped" style="width: 100%">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Short Link</th>
                                  <th>Copy</th>
                                  <th>Link</th>
                                  <th>Copy Count</th>
                                  <th>Click Count</th>
                                  <th width="150">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                                @forelse($shortLinks as $key => $row)
                                  <tr>
                                      <td>{{ ++$key }}</td>
                                      <td><a id="link-{{ $row->id }}" data-url="asfasfasfasf" href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
                                      <td>
                                        <a href="javascript:void(0)" data-id="{{ $row->id }}" class="copyBtn" ><i class="fa fa-copy" ></i></a>
                                      </td>
                                      <td>{{ $row->link }}</td>
                                      <td class="copy_count" >{{ $row->copy_count }}</td>
                                      <td class="click_count" >{{ $row->click_count }}</td>
                                      <td>
                                          <a class="btn btn-xs btn-info edit" data-toggle="modal" data-target=".bs-example-modal-lg-edit" data-id="{{ $row->id }}"  href="javascript:void(0)">Edit</a>
                                          <a class="btn btn-xs btn-danger" id="delete" href="{{ route('delete.shorten.link',$row->id) }}">Delete</a>
                                      </td>
                                  </tr>
                                @empty
                                  <tr>
                                    <td colspan="7" class="text-center">No Data Found</td>
                                  </tr>
                                @endforelse
                          </tbody>
                      </table>
                    </div>
                </div>
            <!-- Start Widget -->
        </div> <!-- container -->

    </div> <!-- content -->

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0" id="myLargeModalLabel">Create Shortener</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="col-xl-12">
                      <div class="card">
                          <div class="card-body">
                              <form method="POST" action="{{ route('generate.shorten.link.post') }}">
                                @csrf
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Enter url</label>
                                      <input type="url" name="link" class="form-control" id="exampleInputEmail1" placeholder="Enter url">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Short url code</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="code" maxlength="6" value="{{ Str::random(6) }}" placeholder="Enter short URL">
                                  </div>
                                  <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                              </form>
                          </div><!-- card-body -->
                      </div> <!-- card -->
                  </div> <!-- col-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade bs-example-modal-lg-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mt-0" id="myLargeModalLabel">Create Shortener</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="col-xl-12">
                      <div class="card">
                          <div class="card-body">
                              <form method="POST" action="{{ route('generate.shorten.link.update') }}">
                                @csrf
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Enter url</label>
                                      <input type="url" name="link" class="form-control" id="edit_link" placeholder="Enter url">
                                      <input type="hidden" name="id" id="id">
                                  </div>
                                  <div class="form-group">
                                      <label for="exampleInputPassword1">Short url code</label>
                                      <input type="text" class="form-control" id="edit_short_link" name="code" maxlength="6" placeholder="Enter short URL">
                                  </div>
                                  <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                              </form>
                          </div><!-- card-body -->
                      </div> <!-- card -->
                  </div> <!-- col-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@push('js')
    <script>
        $(document).ready(function(){
            $(".alert").delay(2000).slideUp(300);
        });

        $(document).on('click', '.copyBtn', function() {
            var id = $(this).attr('data-id');
            var text = $("#link-" + id).text();

            var $temp = $('<textarea>');
            $('body').append($temp);
            $temp.val(text).select();
            document.execCommand('copy');
            $temp.remove();
            swal({
                title: "Good job!",
                text: "Copy Successfully!",
                icon: "success",
                timer: 1000,
                buttons: false,
            });
        });

        $(document).on('click','.copyBtn',function(){
            var id = $(this).data('id');
            var url = "{{ url('shortener-link/copy') }}/"+id;
            $.ajax({
                url:url,
                type:'get',
                success:function(data){
                    $('.copy_count').text(data.copy_count);
                }
            });
        });

        $(document).on('click','.edit',function(){
            var id = $(this).data('id');

            var url = "{{ url('shortener-link/edit') }}/"+id;
            $.ajax({
                url:url,
                type:'get',
                success:function(data){
                    $('#edit_link').val(data.link);
                    $('#edit_short_link').val(data.code);
                    $('#id').val(data.id);
                }
            });
        });
    </script>
@endpush

@endsection
