<html>
    <head>
        <meta charset="utf-8">
        <title>管理系統</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <link href='/lib/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet' />
        <link href='/lib/bootstrap/dist/css/bootstrap-theme.min.css' rel='stylesheet' />
        <link href='/css/admin/body.css' rel='stylesheet' />
    </head>
    <body>
@include('admin.layout.menu')
        <div class="content">
            <h3>廠商列表</h3>
            <div class="nav">
<!--
                <a href="/admin/company/create" class="btn">
                    新增
                </a>
-->
            </div>
            <table class="table1">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>廠商帳號</td>
                        <td>廠商名稱</td>
                        <td>E-mail</td>
                        <td>啟用</td>
                        <td>建立日期</td>
                        <td>修改日期</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                @if(isset($result['companies']))
                @foreach($result['companies'] as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->account }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->activeShow }}</td>
                        <td>{{ $company->created_at }}</td>
                        <td>{{ $company->updated_at }}</td>
                        <td>
                            <a href='/admin/company/edit/{{ $company->id }}' class="glyphicon glyphicon-pencil"></a>
<!--
                            <a href='/admin/company/remove/{{ $company->id }}' class="glyphicon glyphicon-remove companyRemove"></a>
-->
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            <div class="pagination paginationCenter">
            @if(isset($result['amount']))
            @for($i = 0; $i < ceil($result['amount'] / $offset); ++$i)
                @if(($i+1) == $nowPage)
                <label>{{ $i+1 }}</label>
                @elseif(($i+1) != $nowPage && abs($i+1-$nowPage) < 5)
                <a href="/admin/company/?nowPage={{ $i+1 }}">{{ $i+1 }}</a>
                @endif
            @endfor
            @endif
            </div>
        </div>
@include('admin.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/admin/company/index.js"></script>
</html>
