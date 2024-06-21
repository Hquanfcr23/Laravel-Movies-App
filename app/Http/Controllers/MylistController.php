<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Mylist;
use Illuminate\Support\Facades\Auth;

class MylistController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        $mylists = Mylist::where('user_id', $user->id)->get();


        $movies = [];
        
        foreach ($mylists as $mylist) {
            $movie = Http::get('https://api.themoviedb.org/3/movie/'.$mylist->movie_id.'?api_key=6660f19edb8b4f7f256364ffadb0d7bb&append_to_response=credits,videos,images')
             -> json();

             $movies[] = $movie;
        }

        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=6660f19edb8b4f7f256364ffadb0d7bb')
        -> json()['genres'];

        $genres = collect($genresArray) ->mapWithKeys(function($genre) {
            return [$genre['id'] => $genre['name']];
        });

        $mylists = Mylist::all();


        return view('mylist', [
            'genres' => $genres,
            'mylists' => $mylists,
            'movies' => $movies,
        ]
        );
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $mylists = Mylist::all(); 
        $mylist = new Mylist;
        $mylist->user_id = $user->id;
        $mylist->movie_id = $request->movie_id;
        $mylist->save();
    }

    public function delete(Request $request)
    {
        $isExist = 0;
        $user = Auth::user();
        $mylists = Mylist::all(); 
        dump($request->movie_id);
        dump($user->id);
        MyList::where('user_id', $user->id)
                    ->where('movie_id', $request->movie_id)
                    ->delete();
    }
}
