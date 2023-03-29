@extends('main')
@section('content')


<h1>Redaguoti meistrą</h1>

@include('_partials/error')
<form action="/update/master/{{$master->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" class="form-control" name="name" placeholder="Vardas" value="{{$master->name}}">
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="lastName" placeholder="Pavardė" value="{{$master->lastName}}">
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="specialization" placeholder="Meistro specializacija" value="{{$master->specialization}}">
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="city" placeholder="Miestas" value="{{$master->city}}">
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="gender" placeholder="Lytis" value="{{$master->gender}}" >
    </div>
    <div class="form-group m-1">
        <label>Nuotrauka</label>
        <input type="file" class="form-control" name="photo"> 
    </div>
    <button type="submit" class="btn btn-danger">Redaguoti</button>
</form>

@endsection