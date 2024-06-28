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
        <div class="main-new">
          <h1>募集内容入力</h1>
        </div>
        <form action="{{ route('users.post_complete') }}" method="post">
        @csrf
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
        </div>
          <div class="newteam_detail" id="link">
            <div class="newteam_box">
              <div class="required_message">右に<span class="required">*</span>印のある項目は必須項目です。</div>
              <dl>
                <dt>
                  <label for="t_name">チーム名</label>
                  <span class="required">*</span>
                  @if ($errors->has('t_name'))
                    <p class="error-message">{{ $errors->first('t_name') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="t_name" id="t_name" placeholder="チーム名" value=""></dd>
                <dt>
                  <label for="guidance">募集要項</label>
                  <span class="required">*</span>
                  @if ($errors->has('guidance'))
                    <p class="error-message">{{ $errors->first('guidance') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="guidance" id="guidance" placeholder="募集要項"  value=""></dd>
                <dt>
                  <label for="place">活動場所</label>
                  <span class="required">*</span>
                  @if ($errors->has('place'))
                    <p class="error-message">{{ $errors->first('place') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="place" id="place" placeholder="活動場所" value=""></dd>
                <dt>
                  <label for="time">活動日時</label>
                  <span class="required">*</span>
                  @if ($errors->has('time'))
                    <p class="error-message">{{ $errors->first('time') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="time" id="time" placeholder="活動日時" value=""></dd>
                <dt>
                  <label for="body">その他連絡事項</label>
                  <span class="required">*</span>
                  @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                  @endif
                </dt>
                <dd><textarea type="text" name="body" id="body" placeholder="連絡事項" value=""></textarea></dd>
              </dl>  
            </div>
          </div>
          <div class="post_compleate">
            <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
            <button class="right_btn" type="submit" id="btn"  onclick="return confirm('投稿しますか？')" />投稿</button>
          </div>
        </form>
      </section>
      @include('users.footer')
    </body>
</html>