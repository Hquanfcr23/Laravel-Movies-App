<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        

        $full_name = $request->input('fullName');
        $email = $request->input('email');
        $date_of_birth = $request->input('dateOfBirth');
        $current_date_time = Carbon::now('Asia/Ho_Chi_Minh');

        $user = Auth::user(); 
        $user->full_name = $full_name;
        $user->email = $email;
        $user->date_of_birth = $date_of_birth;
        $user->updated_at = $current_date_time;
        /** @var \App\Models\User $user **/
        $user->save();

        return view('profile');
    }
}
