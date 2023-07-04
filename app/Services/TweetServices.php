<?php
namespace App\Services;

use App\Models\Tweet;

class TweetServices
{
    public function getTweets(){
        return Tweet::orderBy('created_at','DESC')->get();
    }
}