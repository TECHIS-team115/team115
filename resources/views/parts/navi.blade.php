<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <a class="navbar-brand" href="#">商品管理システム</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link active" href="/home">HOME</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="/Search">商品検索</a>
                </li>
                @can('adminUser')
                <li class="nav-item active">
                    <a class="nav-link active" href="/user">ユーザー管理</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="/item">商品管理</a>
                </li>
                @endcan
                <li class="nav-item active">
                    <a class="nav-link active" href="/logout">ログアウト</a>
                </li>
            </ul>
            </div>
    </nav>