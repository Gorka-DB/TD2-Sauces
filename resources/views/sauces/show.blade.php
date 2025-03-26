@extends("sauces.layout")
@section("content")
{{--    @if(auth()->check())--}}
{{--        {{ dump(auth()->user()) }}--}}
{{--        {{dump(auth()->id())}}--}}
{{--    @endif--}}
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Sauce Details</h1>
        </div>
        <div class="card-body">
            <h2 class="card-subtitle mb-2 text-muted">Name: {{$sauce->name}}</h2>
            <p class="card-text"><strong>Manufacturer:</strong> {{$sauce->manufacturer}}</p>
            <p class="card-text"><strong>Description:</strong> {{$sauce->description}}</p>
            <p class="card-text"><strong>Main Pepper:</strong> {{$sauce->mainPepper}}</p>
            <p class="card-text"><strong>Heat :</strong> {{$sauce->heat}}</p>
            <img src="{{$sauce->imageUrl}}" alt="Sauce Image" class="img-fluid">
            @if(auth()->check() && auth()->id() === $sauce->userId)
            <a href="{{route("sauces.edit", $sauce->id)}}" class="btn btn-primary mt-3">Edit</a>
            @endif
        </div>
    </div>
</div>
@endsection

