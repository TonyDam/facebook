<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Post $post, User $user) {
        $posts = $post
        ->whereIn('user_id', Auth::user()->amisActive()->pluck('amis_id'))
        ->orWhere('user_id', Auth::user()->id)
        ->with('user')
        ->orderBy('id', 'DESC')
        ->paginate(4);

        $users = $user->orderBy('id', 'DESC')->get()
        ->except(Auth::user()->id)->except(Auth::user()->amisActive()->pluck('amis_id')->toArray());
        return view('home', ['posts' => $posts, 'users' => $users ]);
    }
}
