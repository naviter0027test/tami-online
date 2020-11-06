<html>
    <head>
        <title>聯絡通知信建</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h3>Hi! {{ $params['companyName'] }}</h3>
        <p>有廠商來信諮詢您，請<a href="{{ $params['contactEditUrl'] }}">前往</a>查看</p>
        <textarea style="width: 100%;height: 150px;" readonly>{{ $params['content'] }} </textarea>
    </body>
</html>
