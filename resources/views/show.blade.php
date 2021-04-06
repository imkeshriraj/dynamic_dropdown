
@extends('layout')


@section('content')
<div class="container mt-5">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Gender</th>
      <th scope="col">Hobby</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->country_name}}</td>
      <td>{{$data->state_name}}</td>
      <td>{{$data->city_name}}</td>
      <td>{{$data->gender}}</td>
      <td>{{$data->hobby}}</td>
      <td><a href="/edit/{{$data->id}}" class="btn btn-primary">Edit</a></td>
      <td><a href="delete/{{$data->id}}" class="btn btn-danger">Delete</a></td>
      
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection