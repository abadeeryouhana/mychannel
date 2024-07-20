@extends('admin.adminMaster')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
@section('admin')
    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Category ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                        <hr />
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('category.update',$cat->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                      <input type="hidden" value="{{$cat->id}}" name="categoryid">
                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Name <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$cat->name}}" required autocomplete="name" autofocus placeholder="Category Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Make New Password</label>

                                <div class="col-md-6">
                                    <input id="newpass" type="password" class="form-control @error('newpass') is-invalid @enderror" name="newpass"   autocomplete="name" autofocus placeholder="Category Password">

                                    @error('newpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">

                                <div >
                                    <input id="checkpass" name="checkpass"
                                           class="" type="checkbox" style=" transform: scale(1.5);" @if($cat->ispassword=='1') checked @endif/><span style="display: inline;font-size: 20px;"> is Password</span>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Change Image </label>
                                <div class="col-8">
                                    <input id="image" name="image" placeholder="Choose Image"
                                           class="form-control here" type="file" />

                                </div>
                            </div>



                            <div class="form-group row" style="clear: both">
                                <div class="offset-4 col-8">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Old Image </label><br>
                        @if($cat->image)
                            <img src="{{ url($cat->image) }}"  style="padding:3px;float: left " width="300" height="200" >
                        @else
                            No Image
                        @endif






                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection