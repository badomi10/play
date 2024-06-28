<footer>
    <div class="footer_info">
        <div class="footer_list">
            <form action="{{ route('users.post') }}" method="post">
                @csrf
                <button type="submit" id="btn">投稿一覧</button>
            </form>
        </div>
        <div class="footer_list">
            <form action="{{ route('users.list') }}" method="post">
                @csrf
                <button type="submit" id="btn">応募一覧</button>
            </form>
        </div>
    </div>    
</footer>    

