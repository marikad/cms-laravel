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
		<th>Post link</th>
		<th>Comments</th>
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
		<td>{{str_limit($post->body, 30)}}</td>
		<td><a href="{{route('home.post', $post['slug'])}}">View Post</a></td>
		<td><a href="{{route('comments.show', $post->id)}}">View Comments</a></td>
		<td>{{$post->created_at->diffForHumans()}}</td>
		<td>{{$post->updated_at->diffForHumans()}}</td>
	</tr>
	@endforeach
	@endif
</tbody>
</table>

<div class="row">
	<div class="text-center">
		
		{{$posts->render()}}

	</div>
</div>


@endsection