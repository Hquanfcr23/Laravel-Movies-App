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
use App\Livewire\Comments;

class CommentController extends Controller
{

    public function post(Request $request, string $id) {
       
    }
    
}
