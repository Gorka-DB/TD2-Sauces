@extends('sauces.layout')

@section('content')
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($sauces as $sauce)
                <div class="col">
                    <div class="card shadow-sm mx-4 align-items-center">
                        <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ $sauce->imageUrl }}" role="img" aria-label="Placeholder: Thumbnail">
                        <h3 class="card-title">{{$sauce->name}}</h3>
                        <div class="card-body align-items-center">
                            <H4 class="card-text">Heat: {{$sauce->heat}}/10</H4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('sauces.show', $sauce->id)}}">View</a>
                                    @if(auth()->check() && auth()->id() === $sauce->userId)
                                    <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('sauces.edit', $sauce->id)}}">Edit</a>
                                    <a type="button" class="btn btn-sm btn-outline-danger" href="{{route('sauces.destroy', $sauce)}}">Delete</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection
