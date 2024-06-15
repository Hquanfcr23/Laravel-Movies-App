<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=6660f19edb8b4f7f256364ffadb0d7bb')
        -> json()['results'];

        $nowplayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=6660f19edb8b4f7f256364ffadb0d7bb')
        -> json()['results'];

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=6660f19edb8b4f7f256364ffadb0d7bb')
        -> json()['genres'];

        $genres = collect($genresArray) ->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });

        // dump($nowplayingMovies);

        return view('index', [
            'popularMovies' => $popularMovies,
            'nowplayingMovies' => $nowplayingMovies,
            'genres' => $genres
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=6660f19edb8b4f7f256364ffadb0d7bb&append_to_response=credits,videos,images')
        -> json();
        // dump($movie);
        return view('show', [
            'movie' => $movie,
        ]);
    }

    public function watch(string $id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=6660f19edb8b4f7f256364ffadb0d7bb&append_to_response=credits,videos,images')
        -> json();
        // dump($movie);
        return view('Movie_Watching', [
            'movie' => $movie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
