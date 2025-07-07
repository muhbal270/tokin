@extends ('backend.layouts.app', ['title' => 'Topup Option Page'])

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Topup Option</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary">
                        <a href="{{ route('backend.topup.create') }}" class="text-white">Create Data</a>
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Game</th>
                                <th>Title</th>
                                <th>Jumlah Topup</th>
                                <th>Price</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @forelse ($topups as $item)
                                        <td>{{ $topups->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->product->title ?? '-' }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>
                                            <a href="{{ route('backend.topup.edit', $item->id) }}" class="btn btn-sm btn-primary"><i
                                                    class="bi bi-pencil"></i> Edit</a>
                                            <form action="{{ route('backend.topup.delete', $item->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Yakin ingin hapus data ini ?')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Belum ada data topup.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection