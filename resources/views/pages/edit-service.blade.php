@extends('main')
@section('content')


<h1>Redaguoti servisą</h1>

<form action="/update/service/{{$service->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" class="form-control" name="name" placeholder="Serviso pavadinimas" value="{{$service->name}}">
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="address" placeholder="Serviso adresas" value="{{$service->address}}">
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="manager" placeholder="Serviso vadovas" value="{{$service->manager}}">
    </div>
    <button type="submit" class="btn btn-danger">Redaguoti</button>
</form>

@endsection