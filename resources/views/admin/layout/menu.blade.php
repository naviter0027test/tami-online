<div class="admin-bar">
    <span>{{ config('app.name') }}--管理者</span>
    <div class="tool-right">
        <a href="/admin/logout">登出</a>
    </div>
</div>

<div class="admin-menu">
    <div class="menu1">
        <a href="/admin/home" class="{{ strpos(\Request::path(), 'admin/home') === false ? '' : 'clicked' }} glyphicon glyphicon-home">
        首頁查看</a>
    </div>
    <div class="menu1">
        <a href="/admin/setting" class="{{ strpos(\Request::path(), 'admin/setting') === false ? '' : 'clicked' }} glyphicon glyphicon-lock">
        密碼更改</a>
    </div>
    <div class="menu1">
        <a href="/admin/company" class="{{ strpos(\Request::path(), 'admin/company') === false ? '' : 'clicked' }} glyphicon glyphicon-star-empty">
        廠商管理</a>
    </div>
    <div class="menu1">
        <a href="/admin/contact" class="{{ strpos(\Request::path(), 'admin/contact') === false ? '' : 'clicked' }} glyphicon glyphicon-star-empty">
        聯絡管理</a>
    </div>
</div>
