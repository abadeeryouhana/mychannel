@extends('admin.adminMaster')
@section('admin')
    <hr>
    <hr>
    <hr>
    <hr>
    <hr>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <h4>Edit Info ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                            <hr />
                        </div>
                    </div>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{route('info.update',$info->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Username <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $info->username }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"> Password <span class="text-danger"></span></label>

                                <div class="col-md-6">
                                    <input id="oldpassword" type="text" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword"  autocomplete="new-password" value="{{$info->password}}">

                                    @error('oldpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                     



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection