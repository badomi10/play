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
  @include('users.header')
    <section>
        <div class="acc_comp_box">
          <div class="acc_comp"><h1>アカウント情報を変更いたしました。</h1></div>
          <form action="{{ route('users.index') }}" method="get">
            <div class="post_compleate">
              <button class="right_btn" type="submit" id="btn">メイン画面へ戻る</button>
            </div>
          </form>
        </div>
    </section>
    @include('users.footer')
  </body>
</html>