@extends('layouts.admin')

@section('content')

<h1>Edit Users</h1>

<div class="col-sm-3">
	
	<img src="{{$user->photo ? $user->photo->file : 'https://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

</div>


<div class="col-sm-9">

{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}
<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('role_id', 'Role:') !!}
	{!! Form::select('role_id', $roles, null, ['placeholder'=> 'Choose a role', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('photo_id', 'Image:') !!}
	{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('is_active', 'Status:') !!}
	{!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('password', 'Password:') !!}
	{!! Form::password('password', ['placeholder'=> 'Choose a password', 'class'=>'form-control']) !!}
</div>
<div class="form-group">
		{!! Form::submit('Create Users', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
</div>

<div class="row"></div>
@include('includes.form-error')

@endsection