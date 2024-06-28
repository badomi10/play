<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\css\style.css">
    <title>Play With<</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
  @include('users.header')
    <section>
      <div class="container">
        <div class="main-new">
          <h1>変更内容を記載ください</h1>
        </div>
        <form action="{{ route('users.update',$team->id) }}" method="POST" >
        @csrf
          <div class="event">
            <div class="event-item">
              <label for="category-id">{{ __('種目') }}</label>
              <select class="form-control" id="category_id" name="event_id">
              @foreach($events as $event_val)
                <option value="{{ $event_val['id']}}" @selected($event->name == $event_val['name'])> {{ $event_val['name'] }}</option>
              @endforeach
              </select>
            </div>
            <div class="region">
              <label for="category-id">{{ __('地域') }}</label>
              <select class="form-control" id="category-id" name="region_id">
              @foreach($regions as $region_val)
                <option value="{{ $region_val['id'] }}" @selected($region->name == $region_val['name'])> {{ $region_val['name'] }}</option>
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
                <dd><input type="text" name="t_name" id="t_name" placeholder="チーム名" value="{{$team -> t_name}}"></dd>
                <dt>
                  <label for="guidance">募集要項</label>
                  <span class="required">*</span>
                  @if ($errors->has('guidance'))
                    <p class="error-message">{{ $errors->first('guidance') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="guidance" id="guidance" placeholder="募集要項"  value="{{$team -> guidance}}"></dd>
                <dt>
                  <label for="place">活動場所</label>
                  <span class="required">*</span>
                  @if ($errors->has('place'))
                    <p class="error-message">{{ $errors->first('place') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="place" id="place" placeholder="活動場所" value="{{$team ->place}}"></dd>
                <dt>
                  <label for="time">活動日時</label>
                  <span class="required">*</span>
                  @if ($errors->has('time'))
                    <p class="error-message">{{ $errors->first('time') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="time" id="time" placeholder="活動日時" value="{{$team -> time}}"></dd>
                <dt>
                  <label for="body">その他連絡事項</label>
                  <span class="required">*</span>
                  @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                  @endif
                </dt>
                <dd><textarea type="text" name="body" id="body" placeholder="連絡事項" >{{$team -> body}}</textarea></dd>
              </dl>  
            </div>
          </div>
          <div class="post_compleate">
            <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
            <button class="right_btn" type="submit" id="btn" onclick="return confirm('変更しますか？')" />変更する</button>
          </div>
        </form>
      </div>
    </section>
    @include('users.footer')
  </body>
</html>