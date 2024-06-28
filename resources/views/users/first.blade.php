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
    <section>
      <div class="container">
        <div class="main">
          <h1>募集中のチーム一覧</h1>
        </div>
        <div class="induction">
          <h1>アカウント登録をすると詳細の確認や応募・投稿をすることができます</h1>
          <form action="{{ route('users.signup' ) }}" method="get">
              <div class="induction_btn">
                <button class="induction_button" type="submit" id="btn">アカウント登録</button>
              </div>
          </form>
        </div>
        <form action="{{ route('users.first') }}" method="GET">
          <div class="event">
            <div class="event-item">
              <label for="category-id">{{ __('種目') }}</label>
              <select class="form-control" id="events_id" name="event_id">
              @foreach($events as $event)
                <option value="{{ $event['id'] }}">{{ $event['name'] }}</option>
              @endforeach
              </select>
            </div>
            <div class="region">
              <label for="category-id">{{ __('地域') }}</label>
              <select class="form-control" id="regions-id" name="region_id">
              @foreach($regions as $region)
                <option value="{{ $region['id'] }}">{{ $region['name'] }}</option>
              @endforeach
              </select>
            </div>
            <div class="event_btn"><button id="btn">検索</button></div>
          </div>
        </form>
        @foreach($teams as $team)
        <div class="result_box">
          <div class="result_category">
            <dl class="result_event">
              <dt>種目</dt>
              <dd>{{ $team->event->name }}</dd>
            </dl>
            <dl class="result_region">
              <dt>地域</dt>
              <dd>{{ $team->region->name }}</dd>
            </dl> 
          </div>
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
        </div> 
        @endforeach
        {{ $teams->links() }}
      </div>
    </section>
    <footer>
      <div class="header_item">
        <div class="login_access">
        <form action="{{ route('users.login') }}" method="get">
          @csrf
            <button type="submit" id="btn">ログイン</button>
          </form>
        </div>
        <div class="page_top"><a href="#top" id="pagetop">ページトップへ</a></div> 
      </div>
    </footer> 
  </body>
</html>

