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

                @auth
                    <a class="btn text-light btn-offcanvas" data-bs-toggle="offcanvas" href="#offcanvasExample"
                        role="button" aria-controls="offcanvasExample">
                        Profil
                    </a>
                @endauth

                @guest
                    <a class="btn btn-outline-light ms-4" href="{{ route('login') }}">Masuk</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

@auth
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Halo, {{ Auth::user()->name }}!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="text-group">
                    <h6>Email</h6>
                    <h4>{{ Auth::user()->email }}</h4>
                </div>

                <div class="text-group mt-3">
                    <h6>Nomor Whatsapp</h6>
                    <h4>{{ Auth::user()->phone }}</h4>
                </div>

                <!-- Button trigger modal -->
                <button type="text" class=" btn text-danger mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Keluar akun
                </button>


            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Yakin ingin keluar akun?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Keluar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endauth