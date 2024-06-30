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
      <div class="post_head">
        <div class="new_post">
          <form action="{{ route('users.new_post') }}" method="post">
          @csrf
            <button type="submit" id="btn">新規投稿</button>
          </form>
        </div>
        <div class="post_item">
          <div class="post-tittle"><h1>投稿一覧</h1></div>
        </div>
      </div>
      <div class="post_box">
        @foreach($team_users as $team_user)
        <div class="post_list">
          <dl class="result_dl">
          <div class="result_category">
            <div class="result_event">
              <dt>種目</dt>
              <dd>{{ $event->name}}</dd>
            </div>
            <div class="result_region">
              <dt>地域</dt>
              <dd>{{ $region->name }}</dd>
            </div> 
          </div>
          </dl>
          <div class="result_sub">
          <dl class="result_team">
            <div class="team_name">
              <dt>チーム名</dt>
              <dd>{{$team_user->t_name}}</dd> 
            </div>
              <div class="time">
                <dt>活動日時</dt>
                <dd>{{$team_user->time}}</dd> 
              </div>
              <div class="place">
                <dt>活動場所</dt>
                <dd>{{$team_user->place}}</dd>
              </div>
            </dl>
          </div>
          <div class="btn_list">
            <div class="delete_btn">
              <form action="{{ route('users.delete', $team_user->id) }}" method="post">
                @csrf
                <td><button type="submit" name="delete" class="delete" id="btn" onclick="return confirm('削除しますか？')" />削除</button></td>
              </form>
            </div>
            <div class="edit_btn">
              <form action="{{ route('users.post_edit', $team_user->id) }}" method="post">
              @csrf
                <td><button type="submit" class="edit" id="btn">編集</button></td>
              </form>
            </div>
            <div class="post_list_btn">
              <form action="{{ route('users.post_list', $team_user->id) }}" method="post">
              @csrf
                <td><button type="submit" class="edit" id="btn">応募者一覧</button></td>
              </form>
            </div>
          </div>
        </div>
        @endforeach
        <div class="back_btn_list">
          <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
        </div>
      </div>   
    </section>
    @include('users.footer')
  </body>
</html>