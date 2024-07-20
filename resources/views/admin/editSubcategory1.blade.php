@extends('admin.adminMaster')
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-1.9.1.min.js')}}"></script>
@section('admin')
    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Sub-Category-1  ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route( 'subcategory1.update',$subcat->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <input type="hidden" name="subcatid" value="{{$subcat->id}}">
                                <label for="title" class="col-4 col-form-label">Name<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $subcat->name }}" required autocomplete="name" autofocus placeholder="Category Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Main Category<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control" id="exampleFormControlSelect1">
                                        @if(!$cats->isEmpty())
                                            @foreach($cats as $cat)
                                                @if($subcat->main_cat==$cat->id)
                                                    <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                                @else
                                                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value=" ">No records</option>
                                        @endif
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                       

                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Channel Image </label>
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
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Old Image </label><br>
                        @if($subcat->image)
                            <img src="{{ asset($subcat->image) }}"  style="padding:3px;float: left " width="300" height="200" >
                        @else
                            No Image
                        @endif






                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection