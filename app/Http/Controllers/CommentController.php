<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Post;

class CommentController extends Controller
{

    public function post(Request $request, string $id) {
        $user = Auth::user(); 

        $post = new Post;

        $post->user_name = $user->name;
        $post->description = $request->comment;
        $post->time = Carbon::now('Asia/Ho_Chi_Minh')->toFormattedDateString();
        $post->user_id = $user->id;
        $post->movie_id = $id;
        $post->save();

        
        return redirect(route('movies.show', $id));
    }
    
}
