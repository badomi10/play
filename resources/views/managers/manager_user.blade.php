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
        <div class="user_list_box">
            <div class="user_list">
                <h1>ユーザ一覧</h1>
                @foreach($users as $user)
                <dl class="user_list_dl">
                    <div class="user_list_name">
                        <dt>氏名</dt>
                        <dd>{{$user->name}}</dd>
                    </div>
                    <div class="user_list_email">
                        <dt>メールアドレス</dt>
                        <dd>{{$user->email}}</dd>
                    </div>
                    <div class="users_del">
                        <form action="{{ route('managers.user_delete',$user->id ) }}" method="post">
                            @csrf
                            <button type="submit" name="user_delete" class="user_delete" id="btn" onclick="return confirm('削除しますか？')" />削除</button>
                        </form>
                    </div>
                </dl>
                @endforeach
            </div>
            <div class="user_list_back">
                <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
            </div>
        </div>
    </section>
    @include('users.footer')
  </body>
</html>