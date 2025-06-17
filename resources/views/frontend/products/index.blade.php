@extends ('frontend.layouts.app')

@section('content')
    <!-- game -->
    <div class="product">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <h1>Game Pilihan Populer</h1>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <hr class="text-light">
                </div>
            </div>

            <a class="game" href="./detail.html">
                <div class="row mt-3">
                    <div class="col-lg-4">
                        <figure class="item">
                            <img src="./assets/img1.png" alt="">
                            <figcaption>Mobile Legends</figcaption>
                        </figure>
                    </div>
                    <div class="col-lg-4">
                        <figure class="item">
                            <img src="./assets/img2.png" alt="">
                            <figcaption>EAFC 25</figcaption>
                        </figure>
                    </div>
                    <div class="col-lg-4">
                        <figure class="item">
                            <img src="./assets/img3.png" alt="">
                            <figcaption>PUBG Mobile</figcaption>
                        </figure>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection