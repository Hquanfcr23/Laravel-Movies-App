<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilterController extends Controller
{
    public function index(string $filter)
    {
        

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=6660f19edb8b4f7f256364ffadb0d7bb')
        -> json()['genres'];

        $genres = collect($genresArray) ->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $vn = Http::get('https://api.themoviedb.org/3/discover/movie?api_key=6660f19edb8b4f7f256364ffadb0d7bb&include_adult=false&include_video=false&page=1&sort_by=popularity.desc&with_origin_country=VN')
        -> json()['results'];
        $results = $vn;
        
        foreach($genresArray as $genresItem) {
            if($filter == $genresItem['id']) {
                $results = Http::get('https://api.themoviedb.org/3/discover/movie?api_key=6660f19edb8b4f7f256364ffadb0d7bb&include_adult=false&include_video=false&language=en-US&page=1&primary_release_year=2024&sort_by=popularity.desc&with_genres='.$filter)
                -> json()['results'];
            }
        }

        if($results == 0 && $filter != null) {
            $movies = Http::get('https://api.themoviedb.org/3/movie/'.$filter.'?api_key=6660f19edb8b4f7f256364ffadb0d7bb')
            -> json()['results'];
            $results = $vn;
        }


        // dump($nowplayingMovies);

        return view('filter', [
            'movies' => $results,
            'genres' => $genres,
            'genresArrays' => $genresArray,
            'filter' => $filter
        ]
        );
    }
}
