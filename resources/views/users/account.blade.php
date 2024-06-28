<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <title>Play With</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
  @include('users.header')
    <section>
      <div class="container">
        <div class="account_box">
          <div class="account-tittle"><h1>アカウント情報</h1></div>
          <dl class="account_info">
            <div class="account_name">
              <dt>氏名</dt>
              <dd>{{$users->name}}</dd>
            </div>
            <div class="account_email">
              <dt>メールアドレス</dt>
              <dd>{{$users->email}}</dd>
            </div>
          </dl>
          <form action="{{ route('users.account_edit') }}" method="post">
          @csrf
            <div class="post_compleate">
              <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
              <button class="right_btn" type="submit" id="btn">アカウントを編集する</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    @include('users.footer')
  </body>
</html>