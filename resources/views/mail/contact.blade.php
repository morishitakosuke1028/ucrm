お問い合わせがありました。<br>
以下が内容になります。<br><br>

<strong>お名前</strong>： {{ $params['name'] }}<br>
<strong>メールアドレス</strong>： {{ $params['email'] }}<br>
<strong>会社名</strong>:{{ $params['company'] }}<br>
<strong>お問い合わせ内容</strong>： <br>
{!! nl2br($params['content']) !!}<br><br>
