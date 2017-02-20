@extends('layouts.admin')

@section('content')

<h1>Users</h1>

<table class="table">
  <tr>
    {{-- <th>Image</th> --}}
    <th>Id</th>
    <th>Name</th> 
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Created</th>
    <th>Updated</th>
  </tr>
  <tr>
  @if($users)
  @foreach($users as $user)
  {{-- <td><img src="{{$user->photo}}" alt=""></td> --}}
    <td>{{$user->id}}</td>
    <td>{{ucwords(trans($user->name))}}</td> 
    <td>{{$user->email}}</td>
    <td>{{$user->role['name']}}</td>
    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>{{$user->updated_at->diffForHumans()}}</td>
  </tr>
  @endforeach
  @endif
</table>

@endsection