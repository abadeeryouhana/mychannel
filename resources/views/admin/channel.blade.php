@extends('admin.adminMaster')
@section('admin')

    <div class="container" style="margin-top:100px">
        <hr />
        <h1 style="display: inline-block;">Channels</h1>
        <a href="{{route('channel.create')}}" class="btn btn-success float-right">
            Add Channel
        </a>

        <hr />

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered" id="channells">
            <thead>
            <tr>
                <th scope="col">Order</th>
                <th scope="col">Name</th>
                <th scope="col">Caytegory</th>
                <th scope="col">SubCaytegory1</th>
                <th scope="col">SubCaytegory2</th>
                <th scope="col">Image</th>

                <th scope="col">Action</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @if(!$channels->isEmpty())
                @foreach($channels as $ch)

                    <tr>
                        <td>{{$ch->arr}}</td>
                        <td>{{$ch->name}}</td>
                        <td>{{$ch->category->name}}</td>
<td><?php if(isset($ch->subcategory1->name) && $ch->subcategory1->name!=null)echo $ch->subcategory1->name; else echo "-"; ?></td>
                        <td><?php if(isset($ch->subcategory2->name) && $ch->subcategory2->name!=null)echo $ch->subcategory2->name ;else echo "-"; ?></td>

                        <td>
                            @if($ch->image && $ch->image==0)
                                <img src="{{asset($ch->image)}}" width="200px" height="150px">
                            @elseif( $ch->check==1)
                            <img src="{{$ch->image_url}}" width="200px" height="150px">
                            @else
                                No Image
                            @endif

                        </td>


                        <td>

                            <a href="{{route('channel.edit',$ch->id)}}" class="btn btn-outline-primary">Edit</a>

                        </td>
                        <td>
                            <form action="{{route('deleteChannel',$ch->id)}}" method="post">
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