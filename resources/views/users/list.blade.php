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
    <section>
    @include('users.header')
    <div class="post_head">
      <div class="post_item">
        <div class="post-tittle"><h1> 応募一覧</h1></div>
      </div>
    </div>
    <div class="post_list_box">
      @foreach($teams as $team)
      <div class="post_list">
        <dl class="result_dl">
        <div class="result_category">
          <div class="result_event">
            <dt>種目</dt>
            <dd>{{ $team->event->name }}</dd>
          </div>
          <div class="result_region">
            <dt>地域</dt>
            <dd>{{ $team->region->name  }}</dd>
          </div> 
          </div>
        </dl>
        <div class="result_sub">
        <dl class="result_team">
          <div class="team_name">
            <dt>チーム名</dt>
            <dd>{{$team->t_name}}</dd> 
          </div>
            <div class="time">
              <dt>活動日時</dt>
              <dd>{{$team->time}}</dd> 
            </div>
            <div class="place">
              <dt>活動場所</dt>
              <dd>{{$team->place}}</dd>
            </div>
          </dl>
        </div>
        <div class="cancele">
          @foreach($apps as $app)
          <form action="{{ route('users.cancele',$app->id) }}" method="post">
          @endforeach
          @csrf
          <div class="cancele_btn">
            <button type="submit" id="btn" name="cancele" class="cancele" onclick="return confirm('キャンセルしますか？')" />キャンセル</button>
          </div>
          </form>
        </div>
      </div>
      @endforeach
    </div>  
    <section>
    @include('users.footer')
  </body>
</html>