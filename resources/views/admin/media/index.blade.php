@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_photo'))
        <div class="alert alert-danger">
            <p>{{session('deleted_photo')}}</p>
        </div>

    @endif

    <h1>Photos</h1>

    <table class="table table-striped">

        @if($photos)
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created Date</th>
                <th>Updated Date</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

                @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at->diffForHumans() ? $photo->created_at->diffForHumans() : 'No date available'}}</td>
                <td>{{$photo->updated_at->diffForHumans()}}</td>
                <td>


                    {{Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id] ])}}

                        <div class="form-group">
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        </div>

                    {{Form::close()}}



                </td>
            </tr>
                @endforeach
        </tbody>

        @endif


    </table>




@endsection
