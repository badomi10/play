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
  <header>
    <div class="header_item">
      <div class="header_logo">
        <form action="{{ route('users.first') }}" method="post">
        @csrf
          <button type="submit" id="btn">Play With</button>
        </form>
      </div>
      <div class="login_access">
      <form action="{{ route('users.login') }}" method="get">
        @csrf
          <button type="submit" id="btn">ログイン</button>
        </form>
      </div>
      </div>
      <script src="{{ asset('js/cafe.js') }}"></script>
  </header> 
    <section>
      <div class="pass-item">
        <div class="pass-tittle2"><h1>パスワードの変更が完了しました。</h1></div>
        <div class="back_btn_list">
          <form action="{{ route('users.login') }}" method="get">
          @csrf
            <button class="right_btn" type="submit" id="btn">ログイン画面へ</button>
          </form>
        </div>
      </div>
    </section>
    @include('users.footer')
  </body>
</html>