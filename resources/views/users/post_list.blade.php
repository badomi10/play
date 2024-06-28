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
    <div class="post_box">
      <div class="post_item">
        <div class="post-tittle"><h1>応募者一覧</h1></div>
      </div>
        @foreach($applicants as $applicant)
        <div class="applicant_list">
          <dl class="applicant_dl">
            <div class="applicant_name">
              <dt>応募者</dt>
              <dd>{{$applicant->a_name}}</dd> 
            </div>
            <div class="applicant_number">
              <dt>人数</dt>
              <dd>{{$applicant->number}}</dd> 
            </div>
            <div class="applicant_body">
              <dt>参加日・ご要望等</dt>
              <dd>{{$applicant->a_body}}</dd> 
            </div>  
          </dl>
        </div> 
      @endforeach
    </div>
    <div class="back_btn_list">
      <button class="left_btn" type="button" id="btn" onclick="history.back()">戻る</button>
    </div>
    </section>
    @include('users.footer')
  </body>
</html>