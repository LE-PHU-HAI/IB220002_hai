<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>つぶやきアプリ </h1>
    <div>
        <p>投稿</p>
        @if (session('feedback.success'))
            <p style="color:green">{{ session('feedback.success') }}</p>
        @endif
        <form action="{{route('tweet.create')}}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea name="tweet" id="tweet-content" placeholder="つぶやきを入カ"></textarea>
            @error('tweet')
                <p style = "color:red">{{$message}}</p>
            @enderror
            <button type="submit">投稿</button>

        </form>
    </div>
    <div>
        @foreach ($tweets as $tweet)
        <details>
        <summary><p>{{$tweet->content}}</p></summary>
        <div>
            <a href="{{ route('tweet.update.index',['tweetId'=> $tweet->id])}}">編集</a>
            
            <form action="{{route('tweet.delete', ['tweetId'=> $tweet->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">削除</button>
            </form>
        </div>
        </details>
        @endforeach
    </div>
</body>
</html>