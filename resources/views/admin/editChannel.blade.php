@extends('admin.adminMaster')
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-1.9.1.min.js')}}"></script>
@section('admin')
    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Add Channel ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route( 'channel.update',$ch->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <input type="hidden" name="channelid" value="{{$ch->id}}">
                                <label for="title" class="col-4 col-form-label">Name<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $ch->name }}" required autocomplete="name" autofocus placeholder="Channel Name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Category<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <select name="category" class="form-control" id="selectOption">
                                        @if(!$cats->isEmpty())
                                            @foreach($cats as $cat)
                                                @if($ch->category->name==$cat->name)
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
                                <label for="title" class="col-4 col-form-label">SubCategory1<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <select name="subcategory1" class="form-control" id="selectOption1">
                                        
                                    </select>
                                    @error('subcategory1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">SubCategory2<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <select name="subcategor2" class="form-control" id="selectOption2">
                                       
                                    </select>
                                    @error('subcategor2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                      <div class="form-group row">

                                <label for="title" class="col-4 col-form-label">Channel Link<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $ch->link }}" required autocomplete="arr" autofocus placeholder="Channel Link">

                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="title" class="col-4 col-form-label">Arrangement</label>

                                <div class="col-md-6">
                                    <input id="arr" type="number" class="form-control @error('arr') is-invalid @enderror" name="arr" value="{{ $ch->arr }}" required autocomplete="arr" autofocus placeholder="Channel Arrangement">

                                    @error('arr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="img_url">
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

                        <div class="">

                                <div >
                                    <input id="check" name="check"
                                           class="" type="checkbox" <?php if($ch->check==1)echo 'checked';?> style=" transform: scale(1.5);"/><span style="display: inline;font-size: 22px; font-weight: bold;"> is Link</span>

                                </div>
                            </div>
                            <div class="form-group row" id="def_link">
                                <label for="title" class="col-4 col-form-label">Image URL</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control" name="image_url" value="{{$ch->image_url}}"   autocomplete="message"  placeholder="Enter your URL">

                                   
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
                        @if($ch->image && $ch->check==0)
                            <img src="{{ asset($ch->image) }}"  style="padding:3px;float: left " width="300" height="200" >
                            
                        @elseif($ch->check==1)
                            <img src="{{ $ch->image_url }}"  style="padding:3px;float: left " width="300" height="200" >
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

                    $('#selectOption1').empty();
                    $('#selectOption1').append('<option value="">select sub category1</option>');
                    $.each(response['subcat'], function(key, value) {

                    if(value.id=={{$ch->sub_cat_1}}){
                        $('#selectOption1').append('<option value="' + value.id + '" selected>' + value.name + '</option>');

                        
                    }
                    else
                    {
                        $('#selectOption1').append('<option value="' + value.id + '">' + value.name + '</option>');

                    }

                    

                    });
                    }
                });

  
});

$('#selectOption').val({{$ch->cat_id}}).trigger('change');



$('#selectOption1').change(function() {
    var selectOption1 = $(this).val();

    console.log("selectOption1:",selectOption1);

    $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '{{url("get_sub_cats2")}}' ,
                    data:{sub_cat1:selectOption1},
                    success:function(response){
                        console.log("response:",response['subcat']);

                    $('#selectOption2').empty();
                    // $('#selectOption2').append('<option value="">select sub category2</option>');

                    $.each(response['subcat'], function(key, value) {

                    if(value.id=={{$ch->sub_cat_2}}){
                        $('#selectOption2').append('<option value="' + value.id + '" selected>' + value.name + '</option>');

                     
                    }
                    else
                    {
                        $('#selectOption2').append('<option value="' + value.id + '">' + value.name + '</option>');

                    }

                    });
                    }
                });

  
});


$('#selectOption1').val({{$ch->sub_cat_1}}).trigger('change');


function test(cat_id)
{
    $.ajax({
                    type: 'get',
                    dataType: 'json',
                    url: '{{url("get_sub_cats2")}}' ,
                    data:{sub_cat1:cat_id},
                    success:function(response){
                        console.log("response:",response['subcat']);

                    $('#selectOption2').empty();
                    // $('#selectOption2').append('<option value="">select sub category2</option>');

                    $.each(response['subcat'], function(key, value) {

                    if(value.id=={{$ch->sub_cat_2}}){
                        $('#selectOption2').append('<option value="' + value.id + '" selected>' + value.name + '</option>');

                     
                    }
                    else
                    {
                        $('#selectOption2').append('<option value="' + value.id + '">' + value.name + '</option>');

                    }

                    });
                    }
                });
}
setTimeout(function myStopFunction() {
    // console.log("adsad");
    test({{$ch->sub_cat_1}});
    $('#selectOption2').val({{$ch->sub_cat_2}}).trigger('change');
},1000)


<?php if($ch->check==0){?>
 $('#def_link').closest('.form-group').hide()

 <?php }?>

 <?php if($ch->check==1){?>
 $('#img_url').closest('.form-group').hide()

 <?php }?>
    $(document).on('change','#check',function(){
        if($(this).is(":checked")){
            $('#img_url').closest('.form-group').hide();
            $('#def_link').closest('.form-group').show();
        }
        else{
            $('#img_url').closest('.form-group').show();
            $('#def_link').closest('.form-group').hide();
        }
    });

</script>
@endsection