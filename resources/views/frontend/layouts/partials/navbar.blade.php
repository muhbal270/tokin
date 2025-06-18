<!-- navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ route('frontend.index') }}">Tokin&reg;</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('frontend.index') }}">Beranda</a>
                <a class="nav-link" href="{{ route('frontend.products.index') }}">Game</a>
                <a class="nav-link" href="{{ route('frontend.transactions.index') }}">Transaksi</a>
                <div class="vr text-light d-none d-lg-block"></div>
                <a class="btn btn-outline-light ms-4" href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
    </div>
</nav>