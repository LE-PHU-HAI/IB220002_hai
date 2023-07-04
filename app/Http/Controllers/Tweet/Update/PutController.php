<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class PutController extends Controller
{
    //
    public function d(UpdateRequest $request){
        $tweets = Tweet::where('id', $request->id())->firstOrFail();
        $tweets->content = $request->tweet();
        $tweets->save();
        return redirect()
        ->route('tweet.update.index', ['tweetId' => $tweets->id])
        ->with('feedback.success',"つぶやきを編集した");
    }
}
