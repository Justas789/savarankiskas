@extends('main')
@section('content')

<div class="container">
<h1>Kategorijos</h1>
@foreach ($services as $service)
<div class="card">
    <div class="service-name">
    <p>Serviso pavadinimas: {{$service->name}}</p>
    <p>Serviso adresas: {{$service->address}}</p>
    <p>Serviso vadovas: {{$service->manager}}</p>
</div>
<div class="edit-service d-flex flex-row">
    <a class="edit" href="/service/edit/{{$service->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
    <a class="delete" href="/service/delete/{{$service->id}}"><i class="fa-solid fa-trash-can"></i></a>
</div>
</div>
    @endforeach
</ul>
</div>

@endsection