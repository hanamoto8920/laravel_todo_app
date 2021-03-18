<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
<meta charset="UTF-8">
<title>LaravelでTODO作ってみた！</title>
<style>
  h1 {text-align: center;}
  footer {text-align: center;}
</style>
</head>
<body>
  <div class="container">
      <h1>Todoサイト</h1>
      
      <h2>Todoリスト 新規投稿</h2>

      <form action="/todo/create" method="post">
        @csrf 
        <input type="text" name="title">
        <input type="text" name="text">
        <input type="submit" value="投稿する" >
      </form>
      <a href="/home">トップへ</a>
      <footer>
        <p>copyright 2021 hanamoto.</p>
      </footer>
  </div>
</body>
</html>
