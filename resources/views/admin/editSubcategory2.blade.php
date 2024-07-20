@extends('admin.adminMaster')
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-1.9.1.min.js')}}"></script>
@section('admin')
    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Edit Sub-Category-2  ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route( 'subcategory2.update',$subcat->id)}}" method="post" enctype="multipart/form-data">
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
                                    <select name="category" class="form-control" id="selectOption">
                                        @if(!$cats->isEmpty())
                                            @foreach($cats as $cat)
                                                @if(isset($subcat->sub_category->main_cat) && $subcat->sub_category->main_cat !=null && $subcat->sub_category->main_cat==$cat->id)
                                                    <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                                @else
                                                    <option value="{{$cat->id}}" >{{$cat->name}}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value=" ">No records</option>
                                        @endif
                                    </select>
                                    
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Sub Category<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <select name="sub_category" class="form-control" id="subcategory">
                                       
                                    </select>
                                    @error('sub_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label">Category Image </label>
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

    <script>

$('#selectOption').change(function() {
    var selectedValue = $(this).val();

    console.log("selectedValue:",selectedValue);

    $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '{{url("get_sub_cats")}}' ,
                    data:{main_cat:selectedValue},
                    success:function(response){
                        console.log("response:",response['subcat']);

                    $('#subcategory').empty();
                    $.each(response['subcat'], function(key, value) {

                    if(value.id==<?php if(isset($subcat->sub_category->id) && $subcat->sub_category->id!=null)echo $subcat->sub_category->id;else echo 0; ?>){
                        $('#subcategory').append('<option value="' + value.id + '" selected>' + value.name + '</option>');

                    }
                    else
                    {
                        $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');

                    }

                    });
                    }
                });

  
});
<?php if(isset($subcat->sub_category->main_cat) && $subcat->sub_category->main_cat!=null){?>
$('#selectOption').val({{$subcat->sub_category->main_cat}}).trigger('change');

<?php }?>
</script>
@endsection