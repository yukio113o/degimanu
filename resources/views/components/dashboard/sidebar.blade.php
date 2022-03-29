<div class="container ml-3">
    <h2>商品管理</h2>
    <div class="d-flex flex-column">
        <label class="samazon-sidebar-category-label">
            <a href="/dashboard/products">商品一覧</a>
        </label>
        <label class="samazon-sidebar-category-label">
            <a href="/dashboard/major_categories">親カテゴリ管理</a>
        </label>
        <label class="samazon-sidebar-category-label">
            <a href="/dashboard/categories">カテゴリ管理</a>
        </label>
        <div class="d-flex align-items-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
    </div>
</div>