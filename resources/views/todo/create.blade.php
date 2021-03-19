<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
  <meta charset="UTF-8">
  <title>LaravelでTODO作ってみた！</title>
  <style>
    h1 {
      text-align: center;
    }

    footer {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container">
      <h1>Todoサイト</h1>
      <div class="col-md-7">

        @if (Auth::check())
        <p>ようこそ{{$user->name}}さん</p>
        @else
        <p>ログインしていません。</p>
        <a href="/login">ログイン</a>
        <a href="/register">新規登録</a>
        @endif
  
        <h2>Todoリスト 新規投稿</h2>
        @if (count($errors) > 0)
        <ul>
          <p>下記のエラーが発生しました。正しく入力してください。</p>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
  
        <p>※タイトルは20文字以内</p>
        <p>タイトル・内容は必須です。</p>
        <form action="/todo/create" method="post">
          @csrf
          <h4>タイトル</h4>
          <input type="text" name="title">
          <h4>内容</h4>
          <input type="text" name="text">
          <input type="submit" value="投稿する" class="btn btn-primary">
  
        </form>
        <a href="/home">トップへ</a>
      </div>
      <footer>
        <p>copyright 2021 hanamoto.</p>
      </footer>
  </div>
</body>

</html>