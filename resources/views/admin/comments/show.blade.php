@extends('layouts.admin')

@section('content')

@if(count($comment) > 0)

<h1>Comments</h1>

<table class="table">
<thead>
	<tr>
		<th>Id</th>
		<th>Author</th>
		<th>Email</th>
		<th>Body</th>
		<th>View Post</th>
		<th>View Comments</th>
		<th>Created At</th>
		<th>Updated At</th>
	</tr>
</thead>
<tbody>
@foreach($comment as $comments)
	<tr>
		<td>{{$comments->id}}</td>
		<td>{{$comments->author}}</td>
		<td>{{$comments->email}}</td>
		<td>{{$comments->body}}</td>
		<td><a href="{{route('home.post', $comments->post->id)}}">View Post</a></td>
		<td><a href="{{route('comments.index', $comments->id)}}">View Comments</a></td>
		<td>{{$comments->created_at->diffForHumans()}}</td>
		<td>{{$comments->updated_at->diffForHumans()}}</td>
		<td>
			
			@if($comments->is_active == 1)
					   {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comments->id]]) !!}

                    <input type="hidden" name="is_active" value="0">

                    <div class="form-group">
                    	{!! Form::submit('Un-approve', ['class'=>'btn btn-info']) !!}
                    </div>

                    {!! Form::close() !!}

                    @else
					   {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update', $comments->id]]) !!}

                    <input type="hidden" name="is_active" value="1">

                    <div class="form-group">
                    	{!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}

			@endif
		</td>
		<td>
			   {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy', $comments->id]]) !!}

                    <input type="hidden" name="πosis_active" value="1">

                    <div class="form-group">
                    	{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}
                    </td>
	</tr>
	@endforeach
</tbody>
</table>


@else
<h1 class="text-center">No Comments</h1>

@endif



@stop