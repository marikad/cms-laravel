@extends('layouts.admin')



@section('content')


<h1>Media</h1>

@if($photos)

<form action="delete/media" method="post" class="form-inline">
{{csrf_field()}}
{{method_field('delete')}}
<div class="form-group">
  <select name="checkBoxArray" class="form-control">
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
  <td> <input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}" class="form-control"></td>
    <td>{{$photo->id}}</td>
    <td><img height="50" src="{{$photo->file ? $photo->file : 'https://placehold.it/400x400'}}" alt=""></td>
    <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}
    </td>

    <td>
        <input type="hidden" name="photo" value="{{$photo->id}}">
      <div class="form-group">
    <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
</div>
    </td>
  </tr>
  @endforeach
</table>
</form>
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