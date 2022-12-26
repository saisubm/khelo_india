<!DOCTYPE html>
<html lang="en">
<head>
  <title>Error 500</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
@import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
body{font-family: 'Lato', sans-serif;}
</style>
</head>
<body>
<div class="notfound" style="text-align:center;padding: 40px 15px;">
<h1 style="color: #212529;">Server Error | 500 </h1>
      <img src="{{asset('public/front/error/500.png')}}" class="img-fluid" style="max-width:600px">
      <div><a href="{{url('/')}}" style="background: #29AEFE;padding: 10px 20px;color: #fff;border-radius: 4px;text-decoration: none;display: inline-block;
">Back to Home </a></div>
</div>
</body>
</html>