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
                            <h4>Edit Expiration Date ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                            <hr />
                        </div>
                    </div>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{route('expirationhours.update',$hours->id)}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$hours->id}}" name="hourid">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Expiration Hours<span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="hours" type="number" class="form-control @error('hours') is-invalid @enderror" name="hours"  value="{{ $hours->hours }}" min="1" max="24" >

                                    @error('hours')
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