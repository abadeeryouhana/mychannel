@extends('admin.adminMaster')
@section('admin')

    <div class="container" style="margin-top:100px">
        <hr />
        <h1 style="display: inline-block;">Sub-Categories-2</h1>
        <a href="{{route('subcategory2.create')}}" class="btn btn-success float-right">
            Add Sub-Category-2
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
                <th scope="col">Sub Category</th>
                <th scope="col">Image</th>
                
                <th scope="col">Action</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @if(!$subcategory2s->isEmpty())
            @foreach($subcategory2s as $subcat)

                <tr>
                <td>{{$subcat->name}}</td>
                    <td><?php if(isset($subcat->sub_category->name) && $subcat->sub_category->name!=null)echo $subcat->sub_category->name; else echo '-'; ?></td>
                    <td>
                        @if($subcat->image)
                        <img src="{{asset($subcat->image)}}" width="200px" height="150px">
                            @else
                        No Image
                            @endif

                    </td>
                   

                    <td>

                        <a href="{{route('subcategory2.edit',$subcat->id)}}" class="btn btn-outline-primary">Edit</a>

                    </td>
                    <td>
                        <form action="{{route('deleteSubCategory2',$subcat->id)}}" method="post">
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