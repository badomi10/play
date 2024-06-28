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
    </style>
  </head>
  <body>
    @include('users.header')
    <section>
      <div class="application_item">
        <div class="application_result">
          <h1>ご応募ありがとうございます。</h1>
        </div>
        <div class="left_button">
          <form action="{{ route('users.index') }}" method="post">
          @csrf
          <button class="left_btn" type="submit" id="btn">メインページへ戻る</button>
          </form>
          <form action="{{ route('users.list') }}" method="get">
            @csrf
            <button class="left_button_right" type="submit" id="btn">応募一覧</button>
          </form>
        </div>
        </div>
      </div>
    </section>
    @include('users.footer')
  </body>
</html>