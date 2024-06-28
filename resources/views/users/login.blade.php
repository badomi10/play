<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <title>Play With</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/play.js"></script>
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
      <form action="{{ route('users.login')}}" method="post">
      @csrf
        <div class="login_container">
          <div class="login-box">
            <div class="login-tittle"><h1>ログイン</h1></div>
              <dl>
                <dt>
                  <label>メールアドレス</label>
                  @if ($errors->has('email'))
                  <p class="error-message">{{ $errors->first('email') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="email" id="email" placeholder="メールアドレス" value=""></dd>
                <dt>
                  <label>パスワード</label>
                  @if ($errors->has('password'))
                  <p class="error-message">{{ $errors->first('password') }}</p>
                  @endif
                </dt>
                <dd><input type="password" name="password" id="password" placeholder="パスワード" value=""></dd>
                <a href="{{ route('users.pass') }}" method="get">パスワードを忘れた方はこちら</a>
              </dl>
          </div>
          <div class="login_btn">
            <button type="submit" id="btn">ログイン</button>
          </div>
        </div>
      </form>
      <form action="{{ route('users.signup') }}" method="get">
        <div class="signup_login">
          <div class="signup_title"><button id="btn">アカウントをお持ちでない方はこちら</button></div>
        </div>
      </form>
    </section>
  </body>
</html>
