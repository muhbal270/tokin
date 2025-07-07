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
                    <h1>{{ $product->title }}</h1>
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
                                <li>Pilih jumlah Topup yang diinginkan</li>
                                <li>Upload Bukti & Selesaikan pembayaran</li>
                                <li>Diamond akan langsung ditambahkan ke akun {{ $product->title }} Anda</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- pemesanan -->
                    <form action="{{ route('frontend.orders.store', $product->slug) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="card text-light mt-3 mb-3">
                                <div class="card-header">
                                    <h5>Masukkan Detail Akun</h5>
                                </div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <span class="input-group-text">User ID & Zone ID</span>
                                        <input type="text" aria-label="First name" name="game_user_id" class="form-control @error('game_user_id') is-invalid
                                        @enderror"
                                            placeholder="Masukkan User ID">
                                        <input type="text" aria-label="Last name" name="zone_id" class="form-control @error('zone_id') is-invalid
                                        @enderror"
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
                                        @forelse ($product->topupOptions->sortBy('position') as $item)
                                        <div class="col-lg-4">
                                            <input type="radio" class="btn-check" name="jumlah" id="option{{ $item->id }}" value="{{ $item->id }}"
                                            {{ $loop->first ? 'checked' : '' }}>
                                            <label class="btn" for="option{{ $item->id }}">
                                                {{ $item->title }}<br>
                                                <small>Rp.{{ number_format($item->price, 0, ',', '.') }}</small></label>
                                        </div>
                                        @empty
                                        <div class="col-12">
                                            <p class="text-light">Belum ada pilihan top up untuk game ini.</p>
                                        </div>
                                        @endforelse
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
                                    <select id="bank" name="bank_id" class="form-select" aria-label="Default select example" onchange="tampilkanInfoBank()">
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