@extends ('frontend.layouts.app')

@section('content')
  <!-- transaksi -->
  <div class="transaksi">
    <div class="container mt-5">
        <div class="row d-flex align-items-center">
            <div class="col-lg-5">
                <h1>Riwayat Transaksi</h1>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <hr class="text-light">
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Waktu Transaksi</th>
                    <th>Jumlah Diamond</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2025-05-19 22:20:00</td>
                    <td>100</td>
                    <td>Rp15.000</td>
                    <td>Berhasil</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2025-05-19 22:15:00</td>
                    <td>300</td>
                    <td>Rp45.000</td>
                    <td>Berhasil</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>2025-05-18 10:30:00</td>
                    <td>50</td>
                    <td>Rp8.000</td>
                    <td>Berhasil</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>2025-05-17 14:00:00</td>
                    <td>1000</td>
                    <td>Rp150.000</td>
                    <td>Berhasil</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection