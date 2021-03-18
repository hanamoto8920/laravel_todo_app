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
      
      <h2>Todoリスト 削除ページ</h2>
      <h4>タイトル</h4>
      <p>{{ $form->title }}</p>
      <h4>内容</h4>
      <p>{{ $form->text }}</p>

      <form action="/todo/destroy" method="post">
        @csrf 
        <input type="hidden" name="id" value="{{ $form->id }}">
        <input type="hidden" name="title" value="{{ $form->title }}">
        <input type="hidden" name="text" value="{{ $form->text }}">
        <input type="submit" value="削除する" oneclick="return confirm('削除しますか？');">
      </form>
      <a href="/home">トップへ</a>
      <footer>
        <p>copyright 2021 hanamoto.</p>
      </footer>
  </div>
</body>
</html>