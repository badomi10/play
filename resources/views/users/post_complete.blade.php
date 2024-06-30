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
  <div class="heading">
  @include('users.header')
    <section>
      <form action="{{ route('users.post_complete') }}" method="post">
          @csrf
        <div class="application_box">
          <div class="application-item">
            <div class="application-tittle2"><h1>以下の内容で投稿が完了しました。</h1></div>
          </div>
          <div class="team-box" id="">
            <dl class="team-result">
              <div class="result_dis">
                <dt>種目</dt>
                <dd>{{ $event->name }}</dd>
              </div>
              <div class="result_dis">
                <dt>地域</dt>
                <dd>{{ $region->name }}</dd>
              </div>
              <div class="result_dis">
                <dt>チーム名</dt>
                <dd>{{ $input['t_name'] }}</dd>
              </div>
              <div class="result_dis">
                <dt>募集要項</dt>
                <dd>{{ $input['guidance'] }}</dd>
              </div>
              <div class="result_dis">
                <dt>活動場所</dt>
                <dd>{{ $input['place'] }}</dd>
              </div>
              <div class="result_dis">
                <dt>活動日時</dt>
                <dd>{{ $input['time'] }}</dd>
              </div>
              <div class="result_dis">
                <dt>その他連絡事項</dt>
                <dd>{!! nl2br(htmlspecialchars($input['body'])) !!}</dd> 
              </div>
            </dl>
          </div>
        </div>
      </form>
      <div class="main_button">
        <form action="{{ route('users.index') }}" method="post">
        @csrf
        <button class="main_btn" type="submit" id="btn">メイン画面へ</button>
        </form>
      </div>
    </section>
    @include('users.footer')
  </body>
</html>