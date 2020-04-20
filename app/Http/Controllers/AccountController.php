<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AccountController extends Controller {

    public function show() { return view('/auth/account', ['user' => Auth::user()]); }

    public function account() { return view('/auth/account', array('user' => Auth::user())); }

}
