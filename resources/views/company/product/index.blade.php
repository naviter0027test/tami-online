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
@include('company.layout.menu')
        <div class="content">
            <h3>產品列表</h3>
            <div class="nav">
                <a href="/company/product/create" class="btn create">
                    新增
                </a>
            </div>
            <table class="table1">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>產品名稱</td>
                        <td>是否為第一個</td>
                        <td>建立日期</td>
                        <td>修改日期</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                @if(isset($result['products']))
                @foreach($result['products'] as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->activeShow }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a href='/company/product/edit/{{ $product->id }}' class="glyphicon glyphicon-pencil"></a>
                            <a href='/company/product/remove/{{ $product->id }}' class="glyphicon glyphicon-remove productRemove"></a>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            <input type="hidden" name="productAmount" value="{{ count($result['products']) }}" />
            <div class="pagination paginationCenter">
            @if(isset($result['amount']))
            @for($i = 0; $i < ceil($result['amount'] / $offset); ++$i)
                @if(($i+1) == $nowPage)
                <label>{{ $i+1 }}</label>
                @elseif(($i+1) != $nowPage && abs($i+1-$nowPage) < 5)
                <a href="/company/product/?nowPage={{ $i+1 }}">{{ $i+1 }}</a>
                @endif
            @endfor
            @endif
            </div>
        </div>
        </div>
@include('company.layout.footer')
    </body>
    <script src="/lib/jquery-2.1.4.min.js"></script>
    <script src="/js/company/product/index.js"></script>
</html>
