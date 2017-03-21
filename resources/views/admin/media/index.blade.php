@extends('layouts.admin')



@section('content')


<h1>Media</h1>

@if($photos)

<table class="table">
  <tr>
    <th>Id</th>
    <th>Name</th> 
    <th>Created</th> 
    <th>Delete</th> 
  </tr>
  <tr>

  @foreach($photos as $photo)
    <td>{{$photo->id}}</td>
    <td><img height="50" src="{{$photo->file ? $photo->file : 'https://placehold.it/400x400'}}" alt=""></td>
    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}
    </td>
    <td>
      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
      <div class="form-group">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
</div>

    
{!! Form::close() !!}
    </td>
  </tr>
  @endforeach
</table>
@endif



@endsection