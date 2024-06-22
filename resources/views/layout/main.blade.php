<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/search.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js"></script>
    @livewireStyles
</head>
<body class="font-sans bg-gray-900 text-white mx-16 md:mx-32">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="pt-1 flex flex-col md:flex-row item-center">
                <li class="-mt-1">
                    <a href="{{route('movies.index')}}">
                        <svg class="w-32" viewBox="0 0 96 24" fill="none"><path d="M18 4l2 4h-3l-2-4h-2l2 4h-3l-2-4H8l2 4H7L5 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V4h-4zM35.568 7.047l2.557 7.219 2.543-7.22h2.693V17h-2.057v-2.72l.205-4.697L38.822 17h-1.408l-2.68-7.41.206 4.69V17h-2.051V7.047h2.68zm9.147 6.186c0-.733.141-1.387.424-1.962a3.108 3.108 0 011.216-1.333c.534-.314 1.151-.471 1.853-.471.998 0 1.812.305 2.44.916.634.61.987 1.44 1.06 2.488l.014.506c0 1.135-.317 2.046-.95 2.734-.634.684-1.484 1.026-2.55 1.026-1.067 0-1.919-.342-2.557-1.026-.633-.683-.95-1.613-.95-2.789v-.089zm1.975.144c0 .702.133 1.24.397 1.613.264.37.642.554 1.135.554.478 0 .852-.182 1.12-.547.27-.37.404-.957.404-1.764 0-.688-.134-1.221-.403-1.6-.27-.377-.647-.567-1.135-.567-.483 0-.857.19-1.121.568-.264.373-.397.954-.397 1.743zm8.908 1.21l1.374-4.983h2.064L56.541 17h-1.887L52.16 9.604h2.065l1.374 4.983zM61.996 17h-1.982V9.604h1.982V17zm-2.099-9.31c0-.297.098-.54.294-.732.2-.191.472-.287.814-.287.337 0 .606.096.806.287.201.191.301.435.301.731 0 .301-.102.547-.307.739-.2.191-.467.287-.8.287s-.602-.096-.807-.287a.975.975 0 01-.3-.739zm7.137 9.447c-1.085 0-1.969-.333-2.652-.998-.68-.666-1.019-1.552-1.019-2.66v-.19c0-.744.144-1.407.43-1.99a3.143 3.143 0 011.218-1.354c.528-.319 1.13-.478 1.804-.478 1.012 0 1.807.319 2.386.957.584.638.875 1.543.875 2.714v.806h-4.71c.064.483.255.87.574 1.162.324.292.732.438 1.224.438.761 0 1.356-.276 1.784-.827l.97 1.087a2.99 2.99 0 01-1.202.984 3.98 3.98 0 01-1.682.349zm-.225-6.07c-.392 0-.711.132-.957.396-.242.264-.397.643-.465 1.135h2.748v-.158c-.01-.437-.128-.774-.356-1.011-.228-.242-.551-.363-.97-.363zm10.144 3.882h-3.596L72.674 17h-2.18l3.704-9.953h1.9L79.825 17h-2.18l-.69-2.05zm-3.042-1.66H76.4l-1.25-3.726-1.238 3.725zm13.043.081c0 1.14-.26 2.053-.78 2.741-.514.684-1.211 1.026-2.091 1.026-.747 0-1.351-.26-1.811-.78v3.487h-1.976V9.604h1.832l.068.724c.479-.574 1.103-.861 1.873-.861.912 0 1.62.337 2.126 1.011.506.675.76 1.605.76 2.79v.102zm-1.975-.143c0-.689-.123-1.22-.37-1.593-.241-.374-.594-.56-1.06-.56-.619 0-1.045.236-1.278.71v3.028c.242.488.673.732 1.293.732.943 0 1.415-.773 1.415-2.317zm9.864.143c0 1.14-.26 2.053-.78 2.741-.514.684-1.212 1.026-2.091 1.026-.748 0-1.352-.26-1.812-.78v3.487h-1.975V9.604h1.832l.068.724c.479-.574 1.103-.861 1.873-.861.912 0 1.62.337 2.126 1.011.506.675.759 1.605.759 2.79v.102zm-1.976-.143c0-.689-.123-1.22-.369-1.593-.242-.374-.595-.56-1.06-.56-.62 0-1.045.236-1.278.71v3.028c.242.488.672.732 1.292.732.944 0 1.415-.773 1.415-2.317z" fill="#fff"></path></svg>
                    </a>
                </li>
                {{-- Menu bar --}}
                <div class="z-10" x-data="{ isOpenMenu: false }">
                    <button class="ml-8 md:ml-6 mt-3 md:mt-0 flex items-center cursor-pointer hover:opacity-80 transition"
                            @click="isOpenMenu=true"
                            >
                            <svg class="pb-1" width="17" height="17" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#fff" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>
                            <span class="pb-1 ml-1">Menu</span>
                    </button>
                    {{-- module menu --}}
                    <div
                        class="bg-gray-900 transition-transform fixed top-0 left-0 w-full h-full flex items-center justify-center"
                        x-show="isOpenMenu" 
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="transform -translate-y-full"
                        x-transition:enter-end="transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="transform translate-y-0"
                        x-transition:leave-end="transform -translate-y-full"
                         >
                        <div class="container mx-auto lg:px-32 2xl:px-60 mt-8 rounded-lg overflow-y-auto">
                            {{-- bg-yellow-500 px-2 py-1 rounded-full  text-lg leading-none hover:text-gray-300 --}}
                            <div class="bg-opacity-0 rounded">
                                <div class="bg-opacity-0 rounded-md mb-12">
                                    <div class="flex justify-end pr-4 pt-1">
                                        <button
                                            @click="isOpenMenu=false"
                                            class="bg-yellow-500 w-7 h-7 flex items-center justify-center rounded-full text-2xl leading-none transition hover:bg-yellow-400">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="black" d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                    </button>
                                    </div>
                                    <div class="px-8 pb-8 mb-16">
                                        <div class="p-4 pt-0 responsive-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4  justify-between gap-4 overflow-hidden relative" style="margin-bottom: 180px">
                                            <div class="flex flex-col">
                                                <h2 class="py-4 px-2 text-orange-600 font-bold text-xl">Movie</h2>
                                                <a href="{{route('filter', 'popular')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Popular Movies</a>
                                                <a href="{{route('filter', 'now_playing')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Now Playing</a>
                                                <a href="{{route('filter', 'top_rated')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Top Rated</a>
                                                <a href="{{route('filter', 'upcoming')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Upcoming</a>
                                            </div>
                                            <div class="flex flex-col col-span-2">
                                                <h1 class="py-4 px-2 text-orange-600 font-bold text-xl">Genre</h1>
                                                <div class="grid grid-cols-3 gap-2">
                                                    @foreach ($genresArrays as $genresArray)
                                                    <a href="{{route('filter', $genresArray['id'])}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">{{$genresArray['name']}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="flex flex-col ml-8">
                                                <h1 class="py-4 px-2 text-orange-600 font-bold text-xl">WatchList</h1>
                                                <a href="{{route('filter', 'PopularMovies')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Popular Movies</a>
                                                <a href="{{route('filter', 'PopularMovies')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Now Playing</a>
                                                <a href="{{route('filter', 'PopularMovies')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Top Rated</a>
                                                <a href="{{route('filter', 'PopularMovies')}}" class="px-2 mt-2 cursor-pointer rounded-sm hover:text-orange-500 font-medium transition">Upcoming</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>    
                    </div>  
                </div>
                
                {{-- End menu bar --}}
                <li class="ml-10 md:ml-16 mt-3 md:mt-0">
                    <a class="hover:text-gray-300" href="{{route('movies.index')}}">Movies</a>
                </li>
                <li class="ml-8 md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-300" href="{{route('movies.mylist')}}">Watchlist</a>
                </li>
                <li class="ml-10 md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-300" href="#">Actors</a>
                </li @class(['p-4', 'font-bold' => true])>
            </ul>
            <div class="flex flex-col items-center md:flex-row">
                <livewire:search-dropdown/>
                <a class="ml-5" href="#">
                    <img src="https://w7.pngwing.com/pngs/178/595/png-transparent-user-profile-computer-icons-login-user-avatars-thumbnail.png" alt="avatar" class="rounded-full w-8 h-8">
                </a>
                <div class="dropdownNavbarLink mt-3 md:mt-0 flex flex-col items-center justify-between">
                    <button class="ml-2 text-zinc-100 z-1 flex items-center">
                        @if(auth()->check())
                            {{ auth()->user()->name }}
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endif
                        <svg class="mt-1 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <span class="bg-red-600 w-44 h-4 absolute opacity-0"></span>
                    <div class="dropdownNavbar my-2 font-normal bg-white divide-y divide-gray-100 truncate rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="text-sm text-gray-700 dark:text-gray-400">
                          <li>
                            <a href="{{route('profile.show', auth()->user()->id ?? '0')}}" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">View my account</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                          </li>
                        </ul>
                        <div class="py-1">
                          <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
</body>

</html>







