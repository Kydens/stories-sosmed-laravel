<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\PostUserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(String $username)
    {
        $user = Auth::user();
        $posts = Posts::with('users')->where('users_id', '=', $user->id)->orderBy('id', 'DESC')->get();

        return view('profile.index', compact('user', 'posts'));
    }

    public function likes(String $username)
    {
        $user = Auth::user();
        $postLiked = PostUserLike::with(['users', 'posts'])->where('user_id', '=', $user->id)->get();
        return view('profile.likes', compact('user', 'postLiked'));
    }
}
