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
                        <th>Game</th>
                        <th>Waktu Transaksi</th>
                        <th>Jumlah Topup</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Bukti Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->product->title ?? '-' }}</td>
                            <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>{{ $item->topup->jumlah ?? '-' }}</td>
                            <td>Rp {{ number_format($item->topup->price ?? 0, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $statusColor = [
                                        'pending' => 'secondary',
                                        'paid' => 'warning',
                                        'verified' => 'success'
                                    ];

                                    $statusLabel = [
                                        'pending' => 'Menunggu Pembayaran',
                                        'paid' => 'Menunggu Verifikasi',
                                        'verified' => 'Berhasil'
                                    ];
                                @endphp

                                <span class="text-{{ $statusColor[$item->status] ?? 'secondary' }}">
                                    {{ $statusLabel[$item->status] ?? ucfirst($item->status) }}
                                </span>
                            </td>

                            <td>
                                @if ($item->status === 'pending' && !$item->payment_proof)
                                    <a href="{{ route('frontend.transactions.upload.form', $item->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Kirim
                                    </a>
                                @elseif ($item->status === 'paid' || $item->status === 'verified')
                                    <span class="text-success">Terkirim</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada transaksi.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection