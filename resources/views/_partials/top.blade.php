@if (Auth::check())
<div class="settings">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa-solid fa-circle-user"></i>
  </button>
  <ul class="dropdown-menu">
        <li><p>Prisijungta kaip: {{Auth::user()->name}}</p></li>
        <hr>
        <li><a class="dropdown-item" href="/logout">Atsijungti</a></li>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa-solid fa-gear"></i>
  </button>
  <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/add-service">Pridėti servisą</a></li>
        <li><a class="dropdown-item" href="/add-master">Pridėti meistrą</a></li>
        <li><a class="dropdown-item" href="/show-service">Redaguoti servisus</a></li>
</div>
</div>
@else
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa-solid fa-circle-user"></i>
  </button>
  <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/register">Registruoti</a></li>
        <li><a class="dropdown-item" href="/login">Prisijungti</a></li>
</div>
@endif

<div class="top">
    <div class="search">
        <form action="/searchResults" method="post" class="paieska">
        @csrf
        <div class="name">
        <input type="text" class="search" name="search" placeholder="Paieška" >
</div>
    <div class="specialization">
        <select name="specialization" id="" class="specialization">
            <option selected disabled>Specializacija</option>
            @foreach ($masters as $master)
            <option value="{{$master->specialization}}">{{$master->specialization}}</option>
            @endforeach
        </select>
    </div>
    <div class="service">
        <select name="service" id="">
            <option selected disabled>Servisas</option>
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="city">
        <select name="city" id="">
            <option selected disabled>Miestas</option>
            @foreach ($masters as $master)
            <option value="{{$master->city}}">{{$master->city}}</option>
            @endforeach
        </select>
    </div>
    <div class="gender">
        <select name="gender" id="">
            <option selected disabled>Lytis</option>
            
            <option value="vyras">Vyras</option>
            <option value="moteris">Moteris</option>
            
        </select>
    </div>
    <div class="ratingas">
    <select name="rating" id="">
            <option selected disabled>Reitingas</option>
            
            <option value="5">Teigiamas</option>
            <option value="2.5">Neigiamas</option>
            
        </select>
    </div>
    <div class="go">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</form>
</div>
</div>
</div>
<div class="container">
