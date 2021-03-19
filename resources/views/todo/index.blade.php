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
      
      <h2>Todoリスト一覧</h2>
      <table class="table">
        <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th>内容</th>
          <th></th>
          <th></th>
        </tr>
        @foreach ($todos as $todo)
          <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->title }}</td>
            <td>{{ $todo->text }}</td>
            <td><a href="/todo/edit/{{$todo->id}}"  class="btn btn-primary">更新する</a></td>
            <td><a href="/todo/destroy?id={{$todo->id}}"  class="btn btn-primary">削除する</a></td>
          </tr>
        @endforeach
      </table>
      {{ $todos->links() }}
      
      <a href="/home">トップへ</a><br>
      <a href="/todo/create">投稿する</a>
      <footer>
        <p>copyright 2021 hanamoto.</p>
      </footer>
  </div>
</body>
</html>