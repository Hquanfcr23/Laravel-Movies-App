<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Post;

use function Laravel\Prompts\textarea;

class Comments extends Component
{
    public $comment;
    public function render()
    {
        $posts = Post::all();
        return view('livewire.comments', compact('posts'));
    }

    public function post() {
        $user = Auth::user(); 
        $post = new Post;
        $post->user_name = $user->name;
        $post->description = $this->comment;
        $post->time = Carbon::now('Asia/Ho_Chi_Minh')->toFormattedDateString();
        $post->user_id = $user->id;
        $post->movie_id = session('movie_id');
        $post->save();
        $this->comment = ' ';
    }
}
