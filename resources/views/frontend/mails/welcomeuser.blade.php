<!DOCTYPE html>
<html>

<body>
<h2>Welcome {{ $mailInfo['name'] }} To Ecommerce Test.</h2>

<p>{{ $mailInfo['message']}}</p>
<p>Thank You.</p>

<p>For Login :</p><a href="{{ $mailInfo['link']}}">Click Here.</a>
</body>
</html>