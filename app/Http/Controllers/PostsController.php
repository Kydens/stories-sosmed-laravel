<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\PostUserLike;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request->all());
        $validateData = $request->validate([
            'inputPost'=>'required|string|max:255'
        ]);

        $user = Auth::user();

        Posts::create([
            'users_id'=>$user->id,
            'status'=>$validateData['inputPost'],
        ]);

        return back()->with('add-post', 'New Post Was Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }

    public function likes(Request $request)
    {
        $post = Posts::find($request->post_id);
        $user = Auth::user();

        if ($post) {
            $like = PostUserLike::where('user_id', $user->id)->where('posts_id', $post->id)->first();

            if ($like) {
                // Jika sudah menyukai, maka unlike
                $post->likes -= 1;
                $post->save();

                $like->delete();
                $liked = false;
            } else {
                $post->likes += 1;
                $post->save();

                PostUserLike::create([
                    'user_id' => $user->id,
                    'posts_id' => $post->id,
                ]);
                $liked = true;
            }

            return response()->json(['likes' => $post->likes, 'liked' => $liked]);
        }
    }

    public function getPost(String $username, int $id)
    {
        $post = Posts::findOrFail($id);
        $recommend = Posts::with('users')->inRandomOrder()->take(3)->get();
        return view('post.post', compact('post', 'recommend'));
    }
}
