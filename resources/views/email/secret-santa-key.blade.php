<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secret Santa</title>
</head>
<body>
<h1>Dear {{$name}},</h1>

<p>Here is your secret key to who are you chosen to be Secret Santa, enjoy your holidays and happy new Year.</p>

<p>Secret key: <strong>{{$key}}</strong></p>

<p>Here is the <strong><a href="https://secret-santa.justraspberry.com/imsantato?key={{$key}}">link</a></strong> where your can enter your secret key code and see which college was chosen for you!</p>
</body>
</html>