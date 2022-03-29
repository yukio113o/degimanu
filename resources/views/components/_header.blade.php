<nav class="navbar navbar-expand-md navbar-light shadow-sm samazon-header-container">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'DegiManu') }}
    </a>
    <form class="form-inline" method="GET" action="{{ route('products.index') }}">
        <input class="form-control samazon-header-search-input" type="search" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <div class="input-group">
            <button type="submit" class="btn samazon-header-search-button"><i class="fas fa-search samazon-header-search-icon"></i></button>
        </div>
    </form>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto mr-5 mt-2">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('register') }}"><label>新規登録</label></a>
            </li>
            <hr>
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('login') }}"><label>ユーザーログイン</label></a>
            </li>
            <li class="nav-item mr-5">
                @if(Auth::guard('admins')->check())
                <a class="nav-link" href="{{ route('dashboard') }}">
                  <i class="fas fa-user mr-1"></i><label>管理画面</label>
                </a>
                @else
                <a class="nav-link" href="{{ route('dashboard.login') }}"><label>管理者ログイン</label></a>
                @endauth
            </li>
            @else
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('mypage') }}">
                    <i class="fas fa-user mr-1"></i><label>マイページ</label>
                </a>
            </li>
            @endguest
        </ul>
    </div>
</nav>