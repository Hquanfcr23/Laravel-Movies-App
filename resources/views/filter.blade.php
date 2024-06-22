@extends('layout.main')

@section('content')
 <div class="container mx-auto px-4 py-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">{{$filter}}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($movies as $movie)
            <x-movie-card :movie="$movie" :genres="$genres"/>
            @endforeach
        </div>
    </div>
 
@endsection