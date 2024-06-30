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
  </header> 
    <section>
    <form action="{{ route('users.pass') }}" method="post">
    @csrf
      <div class="pass_box">
        <div class="pass-input">
          <div class="pass-tittle">
            <h1>パスワード再設定</h1>
            <h2>ご登録アドレスのご入力をお願いいたします</h2>
          </div>
          <dl>
            <dt>
              <label for="email">メールアドレス</label>
              @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
              @endif
            </dt>
            <dd><input type="text" name="email" id="email" placeholder="メールアドレス" value=""></dd>
          </dl>
          </div>
          <div class="back_btn">
            <button class="left_btn" type="button" id="btn" onClick="history.back()">戻る</button>
            <button class="right_btn" type="submit" id="btn">パスワードを再設定する</button> 
          </div>
        </div>
    </form>
    </section>
  </body>
</html>