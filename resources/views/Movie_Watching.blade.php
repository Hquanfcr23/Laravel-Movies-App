@extends('layout.main')

@section('content')
    <div class="movie-watch border-b border-gray-800 w-1100 flex flex-col justify-center mx-auto ">
        <h1 class="uppercase tracking-wider text-orange-400 text-lg font-semibold w-full mx-auto px-10 pb-4 pt-12">{{$movie['title']}}</h1>
        <div class="container mx-auto px-4 pb-24 flex flex-col md:flex-row w-full">
            <div class="movie-play mx-auto px-6 w-full">
                {{-- <iframe src="https://2embed.org/embed/movie/653346" height="200" width="300" title="Iframe Example"></iframe> --}}
                <iframe allowfullscreen src="{{'https://vidsrc.to/embed/movie/'.$movie['id']}}" height="500px" width="100%" scrolling="no"></iframe>
            </div>
        </div>
        <span class="mx-auto w-11/12 rounded-md border-b-16 border-gray-700"> </span>
        <div class="container mx-auto px-10 py-10 flex flex-col md:flex-row">
            <img src="{{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}}" alt="{{$movie['title']}}" class="w-60 h-96 md:w-88 rounded-lg">
            <div class="md:ml-24">
                <div class="flex flex-wrap items-center text-gray-300 text-sm mt-2">
                    <h1 class="text-3xl pb-3 pr-4 text-green-600">Vote Averange</h1>
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="orange" viewBox="0 0 24 24"><path stroke="orange" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.27 4.411c.23-.52.346-.779.508-.859a.5.5 0 0 1 .444 0c.161.08.277.34.508.86l1.845 4.136c.068.154.102.23.155.29a.5.5 0 0 0 .168.121c.072.032.156.041.323.059l4.505.475c.565.06.848.09.974.218a.5.5 0 0 1 .137.423c-.026.178-.237.368-.66.75l-3.364 3.031c-.125.113-.188.17-.227.238a.5.5 0 0 0-.064.197c-.009.079.009.161.044.326l.94 4.43c.117.557.176.835.093.994a.5.5 0 0 1-.36.261c-.177.03-.423-.111-.916-.396l-3.924-2.263c-.145-.084-.218-.126-.295-.142a.502.502 0 0 0-.208 0c-.078.017-.15.058-.296.142l-3.923 2.263c-.493.285-.74.427-.917.396a.5.5 0 0 1-.36-.26c-.083-.16-.024-.438.094-.995l.94-4.43c.035-.165.052-.247.044-.326a.5.5 0 0 0-.064-.197c-.04-.069-.102-.125-.227-.238l-3.365-3.032c-.422-.38-.633-.57-.66-.749a.5.5 0 0 1 .138-.423c.126-.128.409-.158.974-.218l4.504-.475c.168-.018.251-.027.323-.059a.5.5 0 0 0 .168-.122c.053-.059.088-.135.156-.289l1.844-4.137Z"/></svg></span>
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

                <div x-data="{like:false}" class="mt-12">
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
                <div x-data="{ isOpen: false }">
                    
                    <!-- module play trailer-->
                    <div
                        style="background-color: rgba(0, 0, 0, .5);"
                        class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                        x-show="isOpen" 
                        x-transition.duration.300ms
                         >
                        <div class="container mx-auto lg:px-32 2xl:px-60 mt-8 rounded-lg overflow-y-auto">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pr-4 pt-1">
                                    <button
                                        @click="isOpen=false"
                                        class="text-3xl leading-none hover:text-gray-300">&times;
                                    </button>
                                </div>
                                <div class="modal-body px-8 py-8">
                                    <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                        <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $movie['videos']['results']['0']['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div> 
                    {{-- end module --}}
                </div>              
            </div>
        </div>

    </div>
@endsection