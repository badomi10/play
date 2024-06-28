<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <title>Play With</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <style>
      .hamburger-menu {
        top: 65px;
      }
    </style>
  </head>
  <body>
    <div class="heading">
      <div class="title">
        <a href="{{ route('users.index') }}">Play with</a></div>
    </div>
    <section>
        <div class="user_list-item">
          <div class="user-list-tittle">ユーザ情報一覧</div>
        </div>
        <div class="user_list-box">
          <div class="user_list-list">
            <div class="user_list-item">ユーザ情報</div>
            <div class="user_list-delate"><button id="btn">削除</button></div>
          </div>
        </div>
        <div class="back-btn"><a href="{{ route('users.login') }}">ログイン画面へ戻る</a></div>
        <div class="back"><button id="btn">戻る</button></div>
    </section>
    @include('users.footer')
  </body>
</html>