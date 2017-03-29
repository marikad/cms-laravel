


@extends('layouts.admin')



@section('content')


<h1>Media</h1>

@if($photos)

<form action="delete/media" method="post" class="form-inline">
{{csrf_field()}}
{{method_field('delete')}}
<div class="form-group">
  <select name="checkBoxArray[]" class="form-control">
    <option value="">Delete</option>
  </select>
</div>
<div class="form-group">
  <input type="Submit" name="delete_all" class="btn btn-primary">
</div>


<table class="table">
  <tr>
    <th><input type="checkbox" class="form-control" id="options"></th>
    <th>Id</th>
    <th>Name</th> 
    <th>Created</th> 
    <th>Delete</th> 
  </tr>
  <tr>

  @foreach($photos as $photo)
  <td><input class="checkBoxes form-control" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
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
</form>
   <td>
      
@endif


@endsection

@section('scripts')


<script>
    $(document).ready(function() {

      $('#options').click(function(){

        if (this.checked) {
          $('.checkBoxes').each(function(){

            this.checked = true;
          });
        } else{
                  $('.checkBoxes').each(function(){

            this.checked = false;
          });
        }

      });

      
    });


</script>

@stop





