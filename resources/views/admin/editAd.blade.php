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
                            <h4> Edit Ad ( <span class="text-danger">*</span><span style="font-size: 14px">required</span> )</h4>
                            <hr />
                        </div>
                    </div>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{route('ad.update',$ad->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">admob id <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="admob_id" type="text" class="form-control @error('admob_id') is-invalid @enderror" name="admob_id" value="{{ $ad->admob_id }}" required autocomplete="admob id" autofocus>

                                    @error('admob_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">start app id <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="start_app_id" type="text" class="form-control @error('start_app_id') is-invalid @enderror" name="start_app_id" value="{{ $ad->start_app_id }}" required autocomplete="start_app_id" autofocus>

                                    @error('start_app_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Admob Ad Banner <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="Admob_Ad_Banner" type="text" class="form-control @error('Admob_Ad_Banner') is-invalid @enderror" name="Admob_Ad_Banner" value="{{ $ad->Admob_Ad_Banner }}" required autocomplete="Admob_Ad_Banner" autofocus>

                                    @error('Admob_Ad_Banner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">start Banner <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="start_Banner" type="text" class="form-control @error('start_Banner') is-invalid @enderror" name="start_Banner" value="{{ $ad->start_Banner }}" required autocomplete="start_Banner" autofocus>

                                    @error('start_Banner')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Admob INTERSTITIAL <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="Admob_INTERSTITIAL" type="text" class="form-control @error('Admob_INTERSTITIAL') is-invalid @enderror" name="Admob_INTERSTITIAL" value="{{ $ad->Admob_INTERSTITIAL }}" required autocomplete="Admob_INTERSTITIAL" autofocus>

                                    @error('Admob_INTERSTITIAL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">start Admob INTERSTITIAL <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="start_Admob_INTERSTITIAL" type="text" class="form-control @error('start_Admob_INTERSTITIAL') is-invalid @enderror" name="start_Admob_INTERSTITIAL" value="{{ $ad->start_Admob_INTERSTITIAL }}" required autocomplete="start_Admob_INTERSTITIAL" autofocus>

                                    @error('start_Admob_INTERSTITIAL')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Admob gift <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="Admob_gift" type="text" class="form-control @error('Admob_gift') is-invalid @enderror" name="Admob_gift" value="{{ $ad->Admob_gift }}" required autocomplete="Admob_gift" autofocus>

                                    @error('Admob_gift')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">start gift <span class="text-danger">*</span></label>

                                <div class="col-md-6">
                                    <input id="start_gift" type="text" class="form-control @error('start_gift') is-invalid @enderror" name="start_gift" value="{{ $ad->start_gift }}" required autocomplete="start_gift" autofocus>

                                    @error('start_gift')
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