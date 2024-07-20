@extends('admin.adminMaster')
@section('admin')


    <div class="container" style="margin-top:100px">
        <hr />

        <h1 style="display: inline-block;">Data</h1>
       <!--<a href="{{route('info.create')}}" class="btn btn-success float-right">-->
       <!--    Add Info-->
       <!-- </a>-->


        <hr />

        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col"> Id</th>

                <th scope="col">Username</th>
                <th scope="col">Created At</th>

                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($infos as $info)
                <tr>
                    <td>{{$info->id}}</td>

                    <td>{{$info->username}}</td>
                    <td>{{$info->created_at}}</td>

                    <td>

                        <a href="{{route('info.edit',$info->id)}}" class="btn btn-primary">Edit</a>
                    </td>
{{--                    <td>--}}
{{--                        <form action="{{route('deleteInfo',$info->id)}}" method="post">--}}
{{--                            @csrf--}}

{{--                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                        </form>--}}

{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection