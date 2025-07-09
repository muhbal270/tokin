@extends ('backend.layouts.app', ['title' => 'Orders Page'])

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Orders</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Invoice</th>
                                <th>Game</th>
                                <th>Jumlah Topup</th>
                                <th>User Id</th>
                                <th>Bank</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th>Bukti Pembayaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($orders as $item)
                                        <td>{{ $orders->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->product->title ?? '-' }}</td>
                                        <td>{{ $item->topup->jumlah ?? '-' }}</td>
                                        <td>{{ $item->game_user_id }} ({{ $item->zone_id }})</td>
                                        <td>{{ $item->bank->bank_name ?? '-' }}</td>
                                        <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <span class="badge bg-{{ 
                                                $item->status === 'verified' ? 'success' : 
                                                ($item->status === 'paid' ? 'warning' : 'secondary') 
                                            }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                        <td>
                                        @if ($item->payment_proof)
                                            <a href="{{ asset('storage/' . $item->payment_proof) }}" target="_blank">
                                                <img src="{{ asset('storage/' . $item->payment_proof) }}" alt="Bukti Pembayaran" width="80" class="img-thumbnail">
                                            </a>
                                        @else
                                            <span class="text-muted">Belum upload</span>
                                        @endif
                                        </td>
                                        <td>
                                            @if ($item->status === 'paid')
                                            <form action="{{ route('backend.order.verify', $item->id) }}" method="POST" style="display: inline;"
                                                onsubmit="return confirm('Yakin ingin verifikasi transaksi ini !!!')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-check-circle"></i> verifikasi
                                                </button>
                                            </form>
                                            @else
                                                <span class="text-muted">---</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center text-muted">Belum ada data orders.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection