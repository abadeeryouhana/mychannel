@extends('admin.adminMaster')
@section('admin')


    <div class="container" style="margin-top:100px">
        <hr />

        <h1 style="display: inline-block;">Expiration Date</h1>
               <hr />

        @if (session()->has('success'))
            <div class="alert alert-success">
                {!! session()->get('success')!!}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>


                <th scope="col">Expiration hours</th>

                <th scope="col">Updated At</th>

                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>
            @if(count($hours)>0)
            @foreach($hours as $hour)
                <tr>

                    <td>{{$hour->hours}}</td>

                    <td>{{$hour->updated_at}}</td>

                    <td>

                        <a href="{{route('expirationhours.edit',$hour->id)}}" class="btn btn-primary">Edit</a>
                    </td>

                </tr>
            @endforeach
                @else
                <tr>

                    <td>No records added</td>



                </tr>
                @endif
            </tbody>
        </table>


    </div>
@endsection