@extends ('frontend.layouts.app')

@section('content')
    <div class="detail">
        <div class="container">
            <div class="bg-detail">
                <div class="overlay">
                </div>
            </div>
            <div class="row d-flex align-items-center">
                <div class="col-lg-4">
                    <h1>Mobile Legends</h1>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <hr class="text-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-light mt-3 mb-3">
                        <div class="card-header">
                            <h5>Cara Top Up</h5>
                        </div>
                        <div class="card-body">
                            <ol>
                                <li>Masukkan User ID dan Zone ID, Contoh: 1234567 (1234)</li>
                                <li>Pilih jumlah Diamond yang diinginkan</li>
                                <li>Upload Bukti & Selesaikan pembayaran</li>
                                <li>Diamond akan langsung ditambahkan ke akun Mobile Legends Anda</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- pemesanan -->
                    <form action="./payment.html">
                        <div class="row">
                            <div class="card text-light mt-3 mb-3">
                                <div class="card-header">
                                    <h5>Masukkan Detail Akun</h5>
                                </div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <span class="input-group-text">User ID & Zone ID</span>
                                        <input type="text" aria-label="First name" class="form-control"
                                            placeholder="Masukkan User ID">
                                        <input type="text" aria-label="Last name" class="form-control"
                                            placeholder="Masukkan Zone ID">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card text-light mt-3 mb-3">
                                <div class="card-header">
                                    <h5>Pilih Nominal Top Up</h5>
                                </div>
                                <div class="card-body text-light">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input type="radio" class="btn-check" name="options-base" id="option5"
                                                autocomplete="off" checked>
                                            <label class="btn" for="option5">💎 50 Diamonds
                                                <br><small>Rp.15.000</small></label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="radio" class="btn-check" name="options-base" id="option6"
                                                autocomplete="off">
                                            <label class="btn" for="option6">💎 100 Diamonds <br>
                                                <small>Rp.50.000</small></label>
                                        </div>
                                        <div class="col-lg-4">
                                            <input type="radio" class="btn-check" name="options-base" id="option8"
                                                autocomplete="off">
                                            <label class="btn" for="option8">💎 500 Diamonds <br>
                                                <small>Rp.75.000</small></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card text-light mt-3 mb-3">
                                <div class="card-header">
                                    <h5>Pembayaran</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-4">
                                            <img src="./assets/ic-bca.webp" alt="" width="50%">
                                        </div>
                                        <div class="col-lg-8">
                                            <h6>Transfer Bank</h6>
                                            <h4>012456789</h4>
                                            <h6>a.n Tokin Sentosa</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light w-100 mt-3">Lanjutkan Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection