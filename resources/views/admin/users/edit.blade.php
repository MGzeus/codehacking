@extends('layouts.admin')



@section('content')

    <h1>Edit User</h1>

    <img src="{{$user->photo ? $user->photo->file : '/images/no-image.png'}}" alt="" class="img-responsive img-rounded">

    <br>

    <div class="col-9">

        {{ Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>'true']) }}

        {{ csrf_field() }}

        @include('includes.form_error')

            <div class="form-group">
                {{Form::label('name', 'Name:')}}
                {{Form::text('name', null, ['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('email', 'Email:')}}
                {{Form::text('email', null, ['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('role_id', 'Role:')}}
                {{Form::select('role_id',[''=>'Choose Options'] + $roles, null, ['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('is_active', 'Status:')}}
                {{Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null ,['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('photo_id', 'Photo:')}}
                {{Form::file('photo_id', null, ['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                {{Form::label('password', 'Password:')}}
                {{Form::text('password', null, ['class'=>'form-control'])}}
            </div>
            <br>
            <div class="form-group">
                {{Form::submit('Create User', ['class'=>'btn btn-primary'])}}
            </div>
        {{ Form::close() }}

    </div>



@endsection
