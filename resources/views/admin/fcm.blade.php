@extends('admin.adminMaster')
<script type="text/javascript" src="{{asset('https://code.jquery.com/jquery-1.9.1.min.js')}}"></script>
@section('admin')
    <div class="container" style="margin-top:100px">
        <br />
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Send Notification Form </h4>
                        <hr />
                    </div>
                      @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route( 'fcm.push')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="linkrow" >
                                <label for="title" class="col-4 col-form-label">Choose Channel Link<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <select name="channellink" class="form-control" id="channellink">
                                        <option value=" " default>select channel</option>
                                        @if(!$channels->isEmpty())
                                            @foreach($channels as $ch)
                                                <option value="{{$ch->link}}">{{$ch->name}}</option>
                                            @endforeach
                                        @else
                                            <option value=" ">No Channels Added</option>
                                        @endif
                                    </select>

                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value=" "  autocomplete="link"  required  placeholder="Link">

                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-4 col-form-label">Message</label>

                                <div class="col-md-6">
                                    <input id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" autofocus placeholder="Message">

                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time" class="col-4 col-form-label"> Image URL </label>
                                <div class="col-8">
                                     <input id="image" name="image" placeholder="Image URL"
                                           class="form-control here" type="text" />
                                    <!--<input id="image" name="image" placeholder="Choose Image"-->
                                    <!--       class="form-control here" type="file" />-->
                                    <div class="valid-feedback">Looks good!</div>
                                    <div class="invalid-feedback">
                                        Please Image Link is required.
                                    </div>
                                </div>
                            </div>
                            <div class="">

                                <div >
                                    <input id="check" name="check"
                                           class="" type="checkbox" onclick="showLink()" style=" transform: scale(1.5);"/><span style="display: inline;font-size: 22px; font-weight: bold;"> is channel</span>

                                </div>
                            </div>
                            <div class="form-group row" id="def_link">
                                <label for="title" class="col-4 col-form-label">Link</label>

                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="customlink" value="{{ old('link') }}"  autocomplete="message"  placeholder="Enter your link">

                                    @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
<script>
    ////////// show Input field in FCM //////
    
    $('#linkrow').closest('.form-group').hide()
    $(document).on('change','#check',function(){
        if($(this).is(":checked")){
            $('#def_link').closest('.form-group').hide();
            $('#linkrow').closest('.form-group').show();
        }
        else{
            $('#def_link').closest('.form-group').show();
            $('#linkrow').closest('.form-group').hide();
        }
    });

    ///////////// Load Link of channel /////
    var op = document.getElementById("channellink");
    var link = document.getElementById("link");
    function show() {
        var opval = op.value;
        link.value=opval;
    }
    op.onchange=show;



</script>
@endsection