@extends('layout.main')

@section('content')
    <div class="movie-watch border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row w-1100">
            <div class="movie-play mx-auto px-6 w-full">
                {{-- <iframe src="https://2embed.org/embed/movie/653346" height="200" width="300" title="Iframe Example"></iframe> --}}
                <iframe allowfullscreen src="{{'https://2embed.org/embed/movie/'.$movie['id']}}" height="500px" width="100%" scrolling="no"></iframe>
            </div>
        </div>
    </div>
@endsection