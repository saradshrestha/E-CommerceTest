<!DOCTYPE html>
<html>

<body>
<h2>Gretting form Ecommerce Test.</h2>
<p>Your Order no {{  $orderInfo['id']}} has been place.</p>
<p>{{ $orderInfo['message']}}</p>
<p>Thank You.</p>

<p>For Login :</p><a href="{{ $orderInfo['link']}}">Click Here.</a>
<a href="www.google.com">Visit Our Website for More Shopping.</a>
</body>
</html>