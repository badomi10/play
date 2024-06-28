<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <title>Play with</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <form action="{{ route('users.complete') }}" method="post">
    @csrf
      <div class="signup_main">
        <div class="signup-tittle">
          <h1>ユーザ登録</h1>
          <p><span class="required">*</span>は必須項目となります。</p>
        </div>
        <div class="signup-box">
          <dl>
            <dt>
              <label for="name">氏名</label>
              <span class="required">*</span>
              @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
              @endif
            </dt>
            <dd><input type="text" name="name" id="name" placeholder="山田太郎" value=""></dd>
            <dt>
              <label for="email">メールアドレス</label>
              <span class="required">*</span>
              @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
              @endif
            </dt>
            <dd><input type="text" name="email" id="email" placeholder="メールアドレス"  value=""></dd>
            <dt>
              <label for="pass">パスワード</label>
              <span class="required">*</span>
              @if ($errors->has('password'))
                <p class="error-message">{{ $errors->first('password') }}</p>
              @endif
            </dt>
            <dd><input type="password" name="password" id="password" placeholder="パスワード"  value=""></dd>
            <p>※パスワードは、英数字でご入力ください。一つ以上の数字、一つ以上の大文字を含めて作成してください</p>
          </dl>  
        </div>
        <div class="signup_btn"><button type="submit" id="btn" onclick="return confirm('登録しますか？')" />登録</button></div>
      </div>    
    </form>      
    <div class="back_btn_list">
      <form action="{{ route('users.first') }}" method="get">
        <button class="left_btn" id="btn">戻る</button>
      </form>
    </div>
  </body>
</html>