@extends('layout.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="paradise" class="w-64 md:w-88">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold">{{$movie['title']}}</h2>
                <div class="flex flex-wrap items-center text-gray-300 text-sm mt-2">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" viewBox="0 0 24 24"><path stroke="orange" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.27 4.411c.23-.52.346-.779.508-.859a.5.5 0 0 1 .444 0c.161.08.277.34.508.86l1.845 4.136c.068.154.102.23.155.29a.5.5 0 0 0 .168.121c.072.032.156.041.323.059l4.505.475c.565.06.848.09.974.218a.5.5 0 0 1 .137.423c-.026.178-.237.368-.66.75l-3.364 3.031c-.125.113-.188.17-.227.238a.5.5 0 0 0-.064.197c-.009.079.009.161.044.326l.94 4.43c.117.557.176.835.093.994a.5.5 0 0 1-.36.261c-.177.03-.423-.111-.916-.396l-3.924-2.263c-.145-.084-.218-.126-.295-.142a.502.502 0 0 0-.208 0c-.078.017-.15.058-.296.142l-3.923 2.263c-.493.285-.74.427-.917.396a.5.5 0 0 1-.36-.26c-.083-.16-.024-.438.094-.995l.94-4.43c.035-.165.052-.247.044-.326a.5.5 0 0 0-.064-.197c-.04-.069-.102-.125-.227-.238l-3.365-3.032c-.422-.38-.633-.57-.66-.749a.5.5 0 0 1 .138-.423c.126-.128.409-.158.974-.218l4.504-.475c.168-.018.251-.027.323-.059a.5.5 0 0 0 .168-.122c.053-.059.088-.135.156-.289l1.844-4.137Z"/></svg></span>
                    <span class="ml-1">{{$movie['vote_average'] * 10 .'%'}}</span>
                    <span class="mx-2">|</span>
                    <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach ($movie['genres'] as $genre)
                        {{$genre['name']}}@if (!$loop->last), @endif
                         @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['credits']['crew'] as $crew)
                        @if($loop -> index < 2)
                        <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                        @endif
                        @endforeach
                        
                    </div>
                </div>
                @if(count($movie['videos']['results']) > 0)
                <div class="mt-12">
                    <a href="https://www.youtube.com/watch?v={{ $movie['videos']['results']['0']['key'] }}" class="flex inline-flex items-center bg-orange-400 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-500 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9V168c0-8.7 4.7-16.7 12.3-20.9z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>   <!-- end movie-info -->

    <!--  movie cast -->
    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if($loop -> index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{'https://image.tmdb.org/t/p/w500/'.$cast['profile_path']}}" alt="actor" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray-300">{{$cast['name']}}</a>
                                <div class="text-sm text-gray-300">
                                    {{$cast['character']}}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>
    </div> 
    <!-- end  movie cast -->

    <!-- movie images -->
    <div class="movie-images border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if($loop -> index < 9)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}}" alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                            </a>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
    <!-- end movie images -->
@endsection
