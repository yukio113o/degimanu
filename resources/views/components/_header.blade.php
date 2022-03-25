<nav class="navbar navbar-expand-md navbar-light shadow-sm samazon-header-container">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'DegiManu') }}
    </a>
    <form class="form-inline">
        <div class="form-group">
            <input class="form-control samazon-header-search-input">
        </div>
        <div class="input-group">
            <button type="submit" class="btn samazon-header-search-button"><i class="fas fa-search samazon-header-search-icon"></i></button>
        </div>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto mr-5 mt-2">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('register') }}"><label>ユーザー登録</label></a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('login') }}"><label>ユーザーログイン</label></a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ route('dashboard.login') }}"><label>管理者ログイン</label></a>
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