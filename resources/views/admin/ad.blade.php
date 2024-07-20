@extends('admin.adminMaster')
@section('admin')


    <div class="container" style="margin-top:100px">
        <hr />

        <h1 style="display: inline-block;">Data</h1>
        {{--        <a href="{{route('info.create')}}" class="btn btn-success float-right">--}}
        {{--            Add Info--}}
        {{--        </a>--}}


        <hr />

        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <table class="table table-bordered" >
            <thead>
            <tr>

                <th scope="col">admob id</th>
                <th scope="col">start app id</th>
                <th scope="col">Admob Ad Banner</th>
                <th scope="col">start Banner</th>
                <th scope="col">Admob INTERSTITIAL</th>
                <th scope="col">start Admob INTERSTITIAL</th>
                <th scope="col">Admob gift</th>
                <th scope="col">start gift</th>
                <th scope="col">Created At</th>

                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @if(!$ads->isEmpty())
            @foreach($ads as $ad)
                <tr>


                    <td>{{$ad->admob_id}}</td>
                    <td>{{$ad->start_app_id}}</td>
                    <td>{{$ad->Admob_Ad_Banner}}</td>
                    <td>{{$ad->start_Banner}}</td>
                    <td>{{$ad->Admob_INTERSTITIAL}}</td>
                    <td>{{$ad->start_Admob_INTERSTITIAL}}</td>
                    <td>{{$ad->Admob_gift}}</td>
                    <td>{{$ad->start_gift}}</td>
                    <td>{{$ad->created_at}}</td>

                    <td>

                        <a href="{{route('ad.edit',$ad->id)}}" class="btn btn-primary">Edit</a>
                    </td>
                    {{--                    <td>--}}
                    {{--                        <form action="{{route('deleteInfo',$info->id)}}" method="post">--}}
                    {{--                            @csrf--}}

                    {{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
                    {{--                        </form>--}}

                    {{--                    </td>--}}
                </tr>
            @endforeach
                @else
            <tr>
                <td >No Records</td>
            </tr>
                @endif
            </tbody>
        </table>


    </div>
@endsection