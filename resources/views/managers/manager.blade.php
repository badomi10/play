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
  @include('managers.manager_header')
    <section>
      <div class="container">
        <div class="main">
          <h1>募集中のチーム一覧</h1>
        </div>
        <form action="{{ route('managers.manager_user') }}" method = "post">
          @csrf
          <div class="user_btn">
              <button type="submit" id="btn">ユーザ一覧</button>
          </div>
        </form>
        <form action="{{ route('managers.manager') }}" method="get">
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
        <form action="{{ route('managers.manager_edit', $team->id) }}" method="post">
        @csrf
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
          <div class="detail"><button type="submit" id="btn">詳細</button></div>
        </form>
      </div>
      @endforeach
      {{ $teams->links() }}
      </div>
      </section>
      @include('users.footer')
  </body>
</html>