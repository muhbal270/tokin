@extends ('frontend.layouts.app')

@section ('content')
    <!-- payment -->
    <div class="payment">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <h1>Upload Bukti Pembayaran</h1>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <hr class="text-light">
                </div>
            </div>
            <div class="row mt-5">
                <form action="./success.html">
                    <div>
                        <label for="formFileLg" class="form-label">Silahkan Upload bukti pembayaran anda 1x24 jam</label>
                        <input class="form-control form-control-lg" id="formFileLg" type="file">
                    </div>
                    <button type="submit" class="btn btn-light w-100 mt-3">Konfirmasi</button>
                </form>
            </div>
        </div>
    </div>
@endsection