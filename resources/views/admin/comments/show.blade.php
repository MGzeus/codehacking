@extends('layouts.admin')


@section('content')



    @if($comments)

    <h1>Comments</h1>

    <table class="table table-striped">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Content</th>
                    <th>Link to Post</th>
                    <th>.</th>
                    <th>.</th>
                </tr>
        </thead>

        <tbody>

            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">View post</a></td>
                    <td>
                            @if ($comment->is_active == 1)

                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="0">

                                    <div class='form-group'>
                                        {!! Form::submit('Un-approve',['class'=>'btn btn-warning']) !!}
                                    </div>

                                {!! Form::close() !!}

                            @else

                                {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                                    <input type="hidden" name="is_active" value="1">

                                    <div class='form-group'>
                                        {!! Form::submit('Approve',['class'=>'btn btn-success']) !!}
                                    </div>

                                {!! Form::close() !!}
                            @endif
                    </td>
                    <td>
                                {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}

                                    <div class='form-group'>
				                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
				                    </div>

                                {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

        @else

            <h3 class="text-center alert alert-danger">No Comments</h3>
    @endif


@endsection
