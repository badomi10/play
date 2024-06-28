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
    <form action="{{ route('users.account_update') }}" method="post">
      <div class="container">
        <div class="main-new">
          <h1>変更内容を記載ください</h1>
        </div>
        <div class="a_edit">
          <div class="a_edit_box">
          <div class="required_message">右に<span class="required">*</span>印のある項目は必須項目です。</div>
            <dl>
              <dt>
                <label>氏名</label>
                <span class="required">*</span>
                @if ($errors->has('name'))
                <p class="error-message">{{ $errors->first('name') }}</p>
                @endif
              </dt>
              <dd><input type="text" name="name" id="name" value="{{$users->name}}"></dd>
              <dt>
                <label>メールアドレス</label>
                <span class="required">*</span>
                @if ($errors->has('email'))
                <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
              </dt>
              <dd><input type="text" name="email" id="email" value="{{$users->email}}"></dd>
            </dl>  
          </div>
        </div>
        <form action="{{ route('users.account_update') }}" method="post">
        @csrf
          <div class="post_compleate">
            <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
            <button class="right_btn" type="submit" id="btn" onclick="return confirm('変更しますか？')" />変更する</button>
          </div>
        </form>
      </section>
      @include('users.footer')
    </body>
</html>