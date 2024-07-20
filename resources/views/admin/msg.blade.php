@extends('admin.adminMaster')
@section('admin')


    <div class="container" style="margin-top:100px">
        <hr />

        <h1 style="display: inline-block;">Message Data</h1>
        <hr />

        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>


                <th scope="col">Version</th>
                <th scope="col">Message</th>
                <th scope="col">Updated At</th>

                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($msg as $ms)
                <tr>

                    <td>{{$ms->version}}</td>
                    <td>{{$ms->message}}</td>
                    <td>{{$ms->updated_at}}</td>

                    <td>

                        <a href="{{route('message.edit',$ms->id)}}" class="btn btn-primary">Edit</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection