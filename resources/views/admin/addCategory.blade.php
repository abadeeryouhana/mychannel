@extends('admin.adminMaster')
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-1.9.1.min.js')}}"></script>
@section('admin')
    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Add Category ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route( 'category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Name<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Category Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Password</label>

                                <div class="col-md-6">
                                    <input id="pass" type="password" class="form-control @error('pass') is-invalid @enderror" name="pass" value="{{ old('pass') }}"  autocomplete="name" autofocus placeholder="Category Password">

                                    @error('pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">

                                <div >
                                    <input id="checkpass" name="checkpass"
                                           class="" type="checkbox" style=" transform: scale(1.5);"/><span style="display: inline;font-size: 20px;"> is Password</span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Category Image <span class="text-danger">*</span></label>
                                <div class="col-8">
                                    <input id="image" name="image" placeholder="Choose Image"
                                           class="form-control here" type="file" />
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please Image Link is required.
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">
                                        Save
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