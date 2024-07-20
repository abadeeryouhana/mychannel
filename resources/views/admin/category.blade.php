@extends('admin.adminMaster')
@section('admin')

    <div class="container" style="margin-top:100px">
        <hr />
        <h1 style="display: inline-block;">Categories</h1>
        <a href="{{route('category.create')}}" class="btn btn-success float-right">
            Add Category
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
                <!--<th scope="col">Id</th>-->
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Is Password</th>
                <th scope="col">Action</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @if(!$categories->isEmpty())
            @foreach($categories as $cat)

                <tr>
                    <!--<td>{{$cat->id}}</td>-->
                    <td>{{$cat->name}}</td>

                    <td>
                        @if($cat->image)
                        <img src="{{asset($cat->image)}}" width="200px" height="150px">
                            @else
                        No Image
                            @endif

                    </td>
                    <td style="font-weight: bold;">
                        @if($cat->ispassword=='1')
                          <span style="color: green">True</span>
                        @else
                            <span style="color: red"> False </span>
                        @endif

                    </td>

                    <td>

                        <a href="{{route('category.edit',$cat->id)}}" class="btn btn-outline-primary">Edit</a>

                    </td>
                    <td>
                        <form action="{{route('deleteCategory',$cat->id)}}" method="post">
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