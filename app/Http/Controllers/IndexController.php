<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;

class IndexController extends Controller
{
    public function a(){
        $tweets= Tweet::all()->sortByDesc('created_at');
        return view('tweet.index')
        ->with('tweets', $tweets);
    }
    //
}
