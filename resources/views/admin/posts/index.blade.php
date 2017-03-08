@extends('layouts.admin')


@section('content')


<h1 class="text-center">Posts</h1>

  <p class="bg bg-danger">{{session('deleted_post')}}</p>



<table class="table">
<thead>
	<tr>
		<th>Id</th>
		<th>Photo</th>
		<th>Author</th>
		<th>Category</th>
		<th>Title</th>
		<th>Body</th>
		<th>Created At</th>
		<th>Updated At</th>
	</tr>
</thead>
<tbody>
@if($posts)
@foreach($posts as $post)
	<tr>
		<td>{{$post->id}}</td>
		<td><img height="50" src="{{$post->photo ? $post->photo->file : 'https://placehold.it/400x400' }}" alt=""></td>
		<td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
		<td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
		<td>{{$post->title}}</td>
		<td>{{$post->body}}</td>
		<td>{{$post->created_at->diffForHumans()}}</td>
		<td>{{$post->updated_at->diffForHumans()}}</td>
	</tr>
	@endforeach
	@endif
</tbody>
</table>


@endsection