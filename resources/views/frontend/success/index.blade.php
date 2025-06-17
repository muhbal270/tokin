@extends ('frontend.layouts.app')

@section ('content')
    <!-- success -->
    <div class="success">
        <div class="container">
            <div class="bg-success">
                <div class="overlay">
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <h1>Terima Kasih</h1>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <hr class="text-light">
                </div>
            </div>
            <div class="row mt-5">
                <h5>Transaksi Telah BERHASIL!, Silahkan cek akun pada game secara berkala!</h5>
                <a href="./game.html" class="btn btn-light mt-3">Top Up Game Lain</a>
            </div>
        </div>
    </div>
@endsection