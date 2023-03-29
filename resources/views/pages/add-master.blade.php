@extends('main')
@section('content')


<h1>Pridėti naują meistrą</h1>

@include('_partials/error')
<form action="/storeMaster" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group m-1">
        <input type="text" class="form-control" name="name" placeholder="Vardas" >
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="lastName" placeholder="Pavardė" >
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="specialization" placeholder="Meistro specializacija" >
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="city" placeholder="Miestas" >
    </div>
    <div class="form-group m-1">
        <input type="text" class="form-control" name="gender" placeholder="Lytis" >
    </div>
    <div class="form-group m-1">
        <label>Nuotrauka</label>
        <input type="file" class="form-control" name="photo"> 
    </div>
    <select name="service">
        <option selected disabled>Servisas, kurioje meistras dirba</option>
        @foreach($services as $service)
        <option value="{{$service->id}}">{{$service->name}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-danger">Pridėti</button>
</form>

@endsection