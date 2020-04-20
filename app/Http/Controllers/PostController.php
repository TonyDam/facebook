<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\Amis;
use App\Like;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post, User $user) {
        $posts = $post
        ->whereIn('user_id', Auth::user()->amisActive()->pluck('amis_id'))->whereNull('parent_id')
        ->orWhere('user_id', Auth::user()->id)->whereNull('parent_id')
        ->with('user')
        ->orderBy('id', 'DESC')
        ->paginate(4);
        $users = $user->orderBy('id', 'DESC')->get()
        ->except(Auth::user()->id)->except(Auth::user()->amisActive()->pluck('amis_id')->toArray());
        return view('home', ['posts' => $posts, 'users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post, Request $request) {
        $validate = $request->validate([
            'text' => 'required',
        ]);
        $post = new Post;
        $post->text = $request->text;
        $post->user_id = $request->user_id;
        $post->parent_id = null;
        $post->save();
        return redirect::back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Post $post) {
        $p = $post->find($id);
       if (Auth::check()) {
        $p->delete($id);
        return redirect::back()->withOk("Publication «" . $p->text . "» removed.");
        }
    }

    public function like($id, Post $post) {
        $user_id = Auth::user()->id;
        $like_post = $post->where('id', $id)->first();

        $like = new Like;
        $like->user_id = $user_id;
        $like->post_id = $like_post->id;
        $like->save();
        
        return redirect()->back()->withOk("Publication liked « " . $like_post->text . " ». ");
    }

    public function unlike($id, Like $like, Post $post) {
        $user_id = Auth::user()->id;
        $post_id = $post->where('id', $id)->first();
        $unlike = $like
            ->where('user_id', $user_id)
            ->where('post_id', $post_id->id)
            ->first();
        $unlike->delete();
        return redirect()->back()->withOk("Publication disliked «" . $post_id->text . " ».");
    }
}
