<!DOCTYPE html>
<html>

<body>
<h2>Welcome {{ $orderInfo['name'] }} To Ecommerce Test.</h2>

<p>{{ $orderInfo['message']}}</p>
<p>Thank You.</p>

<p>For Login :</p><a href="{{ $orderInfo['link']}}">Click Here.</a>
</body>
</html>