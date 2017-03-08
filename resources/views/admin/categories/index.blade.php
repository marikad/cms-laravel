@extends('layouts.admin')


@section('content')

<h1>Categories</h1>

<div class="col-sm-6">

{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store','files'=>true]) !!}
<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
		{!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

</div>

<div class="col-sm-6">
	@if($categories)
<table class="table">
<tr>
	<th>Id</th>
	<th>Name</th>
	<th>Created At</th>
	<th>Updated At</th>
</tr>
<tr>
@foreach($categories as $category)
	<td>{{$category->id}}</td>
	<td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
	<td>{{$category->created_at->diffForHumans()}}</td>
	<td>{{$category->updated_at->diffForHumans()}}</td>
</tr>


@endforeach



</table>
@endif

</div>


    

@endsection