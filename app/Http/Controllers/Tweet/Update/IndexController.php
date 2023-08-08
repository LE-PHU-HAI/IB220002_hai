<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use App\Models\Tweet;
use App\Services\TweetService;


class IndexController extends Controller
{
    public function c(Request $request, TweetService $tweetService){
        $tweetId =(int) $request->route('tweetId');
        if (!$tweetService->checkOwnTweet($request->user()->id, $tweetId)) {
            throw new AccessDeniedHttpException();
        }

        $tweets = Tweet::where('id',$tweetId)-> firstOrFail();
        return view('tweet.update')->with('tweets',$tweets);
        if(is_null($tweets)){
            throw new NotFoundHttpException('存在しないつぶやきです。');
        }
    }
    //
}
