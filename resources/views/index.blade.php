<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="X-CSRF-TOKEN" content="{{csrf_token()}}">
        <title>首页</title>
    </head>
    <body>
        <div id="app"></div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>
