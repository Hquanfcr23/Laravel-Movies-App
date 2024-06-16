@extends('layout.main')

@section('content')
 <div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-400 text-lg font-semibold">MY LIST</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @if($isDel == 1 || $isDel == -1)
            @else
            <div class="mt-8">
                <a href="{{route('movies.shows', $movie['id'])}}">
                    <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="poster" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="{{route('movies.show', $movie['id'])}}" class="text-lg mt-2 hover:text-gray-300">{{$movie['title']}}</a>
                    <div class="flex items-center text-gray-400 text-sm mt-1">
                        <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange" viewBox="0 0 24 24"><path stroke="orange" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.27 4.411c.23-.52.346-.779.508-.859a.5.5 0 0 1 .444 0c.161.08.277.34.508.86l1.845 4.136c.068.154.102.23.155.29a.5.5 0 0 0 .168.121c.072.032.156.041.323.059l4.505.475c.565.06.848.09.974.218a.5.5 0 0 1 .137.423c-.026.178-.237.368-.66.75l-3.364 3.031c-.125.113-.188.17-.227.238a.5.5 0 0 0-.064.197c-.009.079.009.161.044.326l.94 4.43c.117.557.176.835.093.994a.5.5 0 0 1-.36.261c-.177.03-.423-.111-.916-.396l-3.924-2.263c-.145-.084-.218-.126-.295-.142a.502.502 0 0 0-.208 0c-.078.017-.15.058-.296.142l-3.923 2.263c-.493.285-.74.427-.917.396a.5.5 0 0 1-.36-.26c-.083-.16-.024-.438.094-.995l.94-4.43c.035-.165.052-.247.044-.326a.5.5 0 0 0-.064-.197c-.04-.069-.102-.125-.227-.238l-3.365-3.032c-.422-.38-.633-.57-.66-.749a.5.5 0 0 1 .138-.423c.126-.128.409-.158.974-.218l4.504-.475c.168-.018.251-.027.323-.059a.5.5 0 0 0 .168-.122c.053-.059.088-.135.156-.289l1.844-4.137Z"/></svg></span>
                        <span class="ml-1">{{$movie['vote_average'] * 10 .'%'}}</span>
                        <span class="mx-2">|</span>
                        <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                    </div>
                    <div class="text-sm text-gray-300">
                        @foreach ($movie['genres'] as $genre)
                            {{-- {{$genres->get($genre)}}@if (!$loop->last), @endif --}}
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </div>
 </div>

@endsection