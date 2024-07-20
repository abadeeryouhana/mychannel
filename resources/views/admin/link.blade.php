@extends('admin.adminMaster')
@section('admin')

    <div class="container" style="margin-top:100px">
        <hr />
        <h1 style="display: inline-block;">Links</h1>
        <a href="{{route('link.create')}}" class="btn btn-success float-right">
            Add Link
        </a>

        <hr />

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered" id="example">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @if(!$links->isEmpty())
                @foreach($links as $link)

                    <tr>
                        <td>{{$link->id}}</td>
                        <td>{{$link->name}}</td>
                        <td>{{$link->link}}</td>


                        <td>
                            @if($link->image)
                                <img src="{{asset($link->image)}}" width="200px" height="150px">
                            @else
                                No Image
                            @endif

                        </td>

                        <td>

                            <a href="{{route('link.edit',$link->id)}}" class="btn btn-outline-primary">Edit</a>

                        </td>
                        <td>
                            <form action="{{route('deleteLink',$link->id)}}" method="post">
                                @csrf
                                <button  class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td>No Records Added</td>
                </tr>
            @endif
            </tbody>
        </table>


    </div>
@endsection