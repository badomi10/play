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
  <body>
  @include('users.header')
    <section>
      <div class="container">
        <div class="application-tittle">
          <h1>応募者情報入力</h1>
        </div>
        <form action="{{ route('users.application_complete',$team->id) }}" method="post">
        @csrf
          <div class="applicants" id="link">
            <div class="applicant_box">
            <div class="required_message">右に<span class="required">*</span>印のある項目は必須項目です。</div>
              <dl>
                <dt>
                  <label for="a_name">氏名</label>
                  <span class="required">*</span>
                  @if ($errors->has('a_name'))
                  <p class="error-message">{{ $errors->first('a_name') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="a_name" id="a_name" placeholder="氏名" value=""></dd>
                <dt>
                  <label for="number">人数</label>
                  <span class="required">*</span>
                  @if ($errors->has('number'))
                  <p class="error-message">{{ $errors->first('number') }}</p>
                  @endif
                </dt>
                <dd><input type="text" name="number" id="number" placeholder="人数"  value=""></dd>
                <dt>
                  <label for="number">参加日・ご要望等</label>
                  <span class="required">*</span>
                  @if ($errors->has('a_body'))
                  <p class="error-message">{{ $errors->first('a_body') }}</p>
                  @endif
                </dt>
                <dd><textarea type="text" name=" a_body" id="a_body" placeholder="参加日・ご要望等" value=""></textarea></dd>
              </dl>  
            </div>
          </div>
          <div class="application_btn">
            <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
            <button class="right_btn" type="submit" id="btn" onclick="return confirm('応募しますか？')" />確定</button>
          </div> 
        </form>
      </div>
      </section>
    </div>
    @include('users.footer')
  </body>
</html>