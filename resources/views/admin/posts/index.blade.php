@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    @if(Session::has('deleted_post'))

        <div class="alert alert-danger">
            <p>{{session('deleted_post')}}</p>
        </div>
    @endif

    @if(Session::has('updated_post'))

        <div class="alert alert-success">
            <p>{{session('updated_post')}}</p>
        </div>
    @endif

    @if(Session::has('created_post'))

        <div class="alert alert-success">
            <p>{{session('created_post')}}</p>
        </div>
    @endif

    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Posted by</th>
            <th>Category</th>
            <th>Title</th>
            <th>Body</th>
            <th>Post</th>
            <th>Comments</th>
            <th>Created</th>
            <th>Updated</th>

          </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)

                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="40" src="{{$post->photo ? $post->photo->file : '/images/no-image.png'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->body, 30)}}</td>
                    <td><a href="{{route('home.post', $post->id)}}">View post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">View comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
      </table>

@endsection
