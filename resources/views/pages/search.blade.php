@extends('main')
@section('content')
    <div class="nav">
        <a href="/" class="back">Grįžti atgal</a>
    </div>
    <div class="results">
        <ul>
            @if(isset($results))
            @foreach ($results as $result)
            <div class="results-info">
                <div class="results-img">
                    <img src="{{asset('/storage/'.$result->photo)}}">
                    </div>
                <div class="name">
                    <p>{{$result->name}}</p>
                </div>
                <div class="lastName">
                    <p>{{$result->lastName}}</p>
                </div>
                <div class="specialization">
                    <p>{{$result->specialization}}</p>
                </div>
                <div class="service">
                    @if(isset($result->service->name))
                    <p>{{$result->service->name}}</p>
                    @else
                    <p>Niekur nedirba</p>
                    @endif
                </div>
                <div class="city">
                    <p>{{$result->city}}</p>
                </div>
                <div class="stars">
                    @if($result->rating+$result->downrating == 0)
                    <p><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating == 0 && $result->downrating >= 0)
                    <p><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.10 && $result->rating/($result->rating+$result->downrating) > 0)
                    <p><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.20 && $result->rating/($result->rating+$result->downrating) >= 0.10)
                    <p><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.30 && $result->rating/($result->rating+$result->downrating) >= 0.20)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.40 && $result->rating/($result->rating+$result->downrating) >= 0.30)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.50 && $result->rating/($result->rating+$result->downrating) >= 0.40)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.60 && $result->rating/($result->rating+$result->downrating) >= 0.50)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.70 && $result->rating/($result->rating+$result->downrating) >= 0.60)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.80 && $result->rating/($result->rating+$result->downrating) >= 0.70)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 0.90 && $result->rating/($result->rating+$result->downrating) >= 0.80)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i></p>
                    @elseif($result->rating/($result->rating+$result->downrating) <= 1 && $result->rating/($result->rating+$result->downrating) >= 0.90)
                    <p><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></p>
                    @endif
            </div>
            </div>@endforeach
        </ul>
        @endif
    </div>
</form>

@endsection