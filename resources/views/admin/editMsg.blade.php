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
                            <h4>Edit Message ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                            <hr />
                        </div>
                    </div>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{route('message.update',$msg->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Message <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="msg" type="text" class="form-control @error('msg') is-invalid @enderror" name="message" value="{{ $msg->message }}" required  autofocus>

                                    @error('msg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Version<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="version" type="test" class="form-control @error('version') is-invalid @enderror" name="version"  value="{{ $msg->version }}">

                                    @error('version')
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