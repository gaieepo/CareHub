<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Patient;

class UserController extends Controller
{
    public function show($id) {
    	return view('user/show')->withUser(User::find($id));
    }
}
