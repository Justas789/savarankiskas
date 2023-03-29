@extends('main')
@section('content')


<h1>Pridėti naują servisą</h1>

<form action="/storeService" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" class="form-control" name="name" placeholder="Serviso pavadinimas" >
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="address" placeholder="Serviso adresas" >
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="manager" placeholder="Serviso vadovas" >
    </div>
    <button type="submit" class="btn btn-danger">Pridėti</button>
</form>

@endsection