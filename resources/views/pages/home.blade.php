@extends('main')
@section('content')

@include('_partials/top')
<div class="container">
<div class="masters">
    @foreach ($masters as $master)
    <div class="all row">
        <div class="info col-6">
            <div class="img">
            <img src="{{asset('/storage/'.$master->photo)}}">
            </div>
            <div class="name">
                <p>{{$master->name}} {{$master->lastName}}</p>
            </div>
            <div class="specialization">
                <p>{{$master->specialization}}</p>
            </div>
            <div class="service">
                @if(isset($master->service->name))
                <p>{{$master->service->name}}</p>
                @else
                <p>Niekur nedirba</p>
                @endif
            </div>
            <div class="city">
                <p>{{$master->city}}</p>
            </div>
            
        </div>
        <div class="rating col-6">
            <div class="like">
                <div class="stars">
                        @if($master->rating+$master->downrating == 0)
                        <p><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating == 0 && $master->downrating >= 0)
                        <p><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.10 && $master->rating/($master->rating+$master->downrating) > 0)
                        <p><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.20 && $master->rating/($master->rating+$master->downrating) >= 0.10)
                        <p><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.30 && $master->rating/($master->rating+$master->downrating) >= 0.20)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.40 && $master->rating/($master->rating+$master->downrating) >= 0.30)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.50 && $master->rating/($master->rating+$master->downrating) >= 0.40)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.60 && $master->rating/($master->rating+$master->downrating) >= 0.50)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.70 && $master->rating/($master->rating+$master->downrating) >= 0.60)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.80 && $master->rating/($master->rating+$master->downrating) >= 0.70)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 0.90 && $master->rating/($master->rating+$master->downrating) >= 0.80)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></p>
                        @elseif($master->rating/($master->rating+$master->downrating) <= 1 && $master->rating/($master->rating+$master->downrating) >= 0.90)
                        <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                        @endif
                </div>
                <div class="likedislike">
                <div class="Patinka">
                    <form action="/rate/{{$master->id}}" method="get" enctype="multipart/form-data">
                    </div>
                    <div class="love">
                        <button type="submit"><i class="fa-solid fa-thumbs-up"></i></button>({{$master->rating}})
                    </form>
                    </div>
                    <div class="Nepatinka">
                    <form action="/downrate/{{$master->id}}" method="get" enctype="multipart/form-data">
                    </div>
                    <div class="count">
                        </div>
                        <div class="love">
                            <button type="submit"><i class="fa-solid fa-thumbs-down"></i></button>({{$master->downrating}})
                        </form>
                    </div>
</div>
                    
            </div>
            @if (Auth::check())
            <div class="edit">
                <div class="delete">
                <a class="edit" title ="Redaguoti" href="/master/edit/{{$master->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                <a class="delete" title="Naikinti" href="/master/delete/{{$master->id}}"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
</div>

@endsection