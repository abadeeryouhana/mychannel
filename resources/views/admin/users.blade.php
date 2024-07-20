@extends('admin.adminMaster')
@section('admin')


    <div class="container" style="margin-top:100px">
        <hr />

        <h1 style="display: inline-block;">Users</h1>
        <a href="{{route('user.create')}}" class="btn btn-success float-right">
            Add User
        </a>


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

                    <th scope="col">Email</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>

                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
{{--                    <td>--}}

{{--                        <a href="{{route('user.edit',$user->id)}}" class="btn btn-outline-primary">Edit</a>--}}
{{--                    </td>--}}
                    <td>
                        <form action="{{route('deleteUser',$user->id)}}" method="post">
                            @csrf

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection