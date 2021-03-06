<html>
    <head>
        <meta charset="utf-8">
        <title>管理系統</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/company/body.css' rel='stylesheet' />
    </head>
    <body>
@include('company.layout.menu')
        <div class="content">
            <h3>結果</h3>
            <div class="nav">
            </div>
            <table class="table1">
                <thead>
                    <tr>
                        <td>結果</td>
                        <td>訊息</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $result['result'] == true ? '成功' : '失敗' }}</td>
                        <td>{{ $result['msg'] }}</td>
                    </tr>
                </tbody>
            </table>

            </div>
        </div>
@include('company.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
</html>

