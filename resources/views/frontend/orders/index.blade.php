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
                                    <label for="bank">Pilih Bank</label>
                                    <select id="bank" class="form-select" aria-label="Default select example" onchange="tampilkanInfoBank()">
                                        <option selected disable>-- Pilih Bank --</option>
                                        @foreach ($bank as $item)
                                            <option value="{{ $item->id }}" 
                                                data-bank-name="{{ $item->bank_name }}"
                                                data-account-number="{{ $item->account_number }}"
                                                data-account-name="{{ $item->account_name }}"
                                                data-image="{{ asset('storage/banks/' . $item->image) }}">
                                                {{ $item->bank_name }} - {{ $item->account_number }} (a.n {{ $item->account_name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id='info-bank' class="row d-flex align-items-center">
                                    <div class="col-lg-4">
                                        <img id="bank-image" src="" alt="" width="100">
                                    </div>
                                    <div class="col-lg-8">
                                        <h6 >Transfer Bank</h6>
                                        <h4 id="bank-number">-</h4>
                                        <h6 id="bank-account">a.n </h6>
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

<script>
function tampilkanInfoBank() {
    const select = document.getElementById('bank');
    const selected = select.options[select.selectedIndex];

    const accountNumber = selected.getAttribute('data-account-number');
    const accountName = selected.getAttribute('data-account-name');
    const image = selected.getAttribute('data-image');

    document.getElementById('bank-number').innerText = accountNumber;
    document.getElementById('bank-account').innerText = 'a.n ' + accountName;
    document.getElementById('bank-image').src = image;

}
</script>