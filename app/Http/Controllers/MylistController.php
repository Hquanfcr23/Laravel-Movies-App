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

        $isDel = -1;


        return view('mylist', [
            'genres' => $genres,
            'isDel' => $isDel,
            'movies' => $movies,
        ]
        );
    }

    public function add(Request $request)
    {
        $user = Auth::user(); 
        $mylist = new Mylist;
        $mylist->user_id = $user->id;
        $mylist->movie_id = $request->item_id;;
        $mylist->save();
        dump($request->item_id);

        return response()->json([
            'success' => true,
            'message' => 'Đã thêm mục vào danh sách của bạn.'
        ]);
    }
}
