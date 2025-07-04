<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts;// we call posts as propertie just to get a collection not a HasMany
        return view('users.dashboard' , ['posts' => $posts]);
    }
}
