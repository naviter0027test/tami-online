<div class="admin-bar">
    <span>系統 -- 廠商</span>
    <div class="tool-right">
        <a href="/company/logout">登出</a>
    </div>
</div>

<div class="admin-menu">
    <div class="menu1">
        <a href="/company/setting" class="{{ strpos(\Request::path(), 'company/setting') === false ? '' : 'clicked' }} glyphicon glyphicon-lock">
        密碼更改</a>
    </div>
    <div class="menu1">
        <a href="/company/edit" class="{{ strpos(\Request::path(), 'company/edit') === false ? '' : 'clicked' }} glyphicon glyphicon-file">
        基本資料</a>
    </div>
    <div class="menu1">
        <a href="/company/product" class="{{ strpos(\Request::path(), 'company/product') === false ? '' : 'clicked' }} glyphicon glyphicon-briefcase">
        產品管理</a>
    </div>
    <div class="menu1">
        <a href="/company/contact" class="{{ strpos(\Request::path(), 'company/contact') === false ? '' : 'clicked' }} glyphicon glyphicon-envelope">
        聯絡管理</a>
    </div>
</div>
