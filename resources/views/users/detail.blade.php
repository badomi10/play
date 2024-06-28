<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <title>Play With</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/play.js') }}"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
  @include('users.header')
    <section>
      <div class="container">
        <div class="main">
          <h1>チーム詳細</h1>
          <!-- <img class="gym" src="{{ asset('img/adpDSC_0186.jpg') }}" alt=""> -->
        </div>
        <div class="result_category">
            <div class="result_event_datail">
              <dt>種目</dt>
              <dd>{{ $team->event->name }}</dd>
            </div>
            <div class="result_region_datail">
              <dt>地域</dt>
              <dd>{{ $team->region->name }}</dd>
            </div> 
        </div>
        <div class="team_detail" id="link">
          <dl>
            <div class="team_name">
              <dt>チーム名</dt>
              <dd>{{$team->t_name}}</dd> 
            </div>
            <div class="team_guidance">
              <dt>募集要項</dt>
              <dd>{{$team->guidance}}</dd> 
            </div>
            <div class="team_place">
              <dt>活動場所</dt>
              <dd>{{$team->place}}</dd> 
            </div>
            <div class="team_time">
              <dt>活動時間</dt>
              <dd>{{$team->time}}</dd> 
            </div>
            <div class="team_body">
              <dt>その他</dt>
              <dd>{!! nl2br(htmlspecialchars($team->body)) !!}</dd> 
            </div>
          </dl>
        </div>
        @if (!$team->isLikedBy(Auth::user()))
          <span class="likes">
              いいね<i class="fas fa-heart like-toggle" data-team-id="{{ $team->id }}"></i>
            <span class="like-counter">{{$team->likes_count}}</span>
          </span><!-- /.likes -->
        @else
          <span class="likes">
          いいね<i class="fas fa-heart  like-toggle liked" data-team-id="{{ $team->id }}"></i>
            <span class="like-counter">{{$team->likes_count}}</span>
          </span><!-- /.likes -->
        @endif
        <div class="post_compleate">
          <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
          <form action="{{ route('users.application',$team->id) }}" method="post">
          @csrf
            <button class="app_btn" type="submit" id="btn">応募する</button>
          </form>
        </div>
      </div>
    </section>
    @include('users.footer')
  </body>
</html>

