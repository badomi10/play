<header>
    <nav>
        <div class="header-item">
            <div class="header-logo">
                <form action="{{ route('users.index') }}" method="post">
                @csrf
                <button type="submit" id="btn">Play With</button>
                </form>
            </div>
            <div class="header-list">
                <div class="click_list">
                    <form action="{{ route('users.account') }}" method="post">
                    @csrf
                    <button type="submit" id="btn">アカウント情報</button>
                    </form>
                </div>
                <div class="click_list">
                <form action="{{ route('users.logout') }}" method="get">
                @csrf
                <button type="submit" id="btn">ログアウト</button>
                </form>
                </div>
            </div>
        </div>
    </nav>
</header> 
