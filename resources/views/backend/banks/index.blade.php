@extends ('backend.layouts.app', ['title' => 'Template Page'])

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Template</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary">
                    <a href="{{ route('backend.bank.create') }}" class="text-white">Create Data</a>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bank Name</th>
                            <th>Account Number</th>
                            <th>Account Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($banks as $item)
                        <tr>
                            <td>{{ $banks->firstItem() + $loop->index }}</td>
                            <td>{{ $item->bank_name }}</td>
                            <td>{{ $item->account_number }}</td>
                            <td>{{ $item->account_name }}</td>
                            <td>
                                <img src="{{ asset('storage/banks/' . $item->image) }}" alt="{{ $item->bank_name }}" width="80">
                            </td>
                            <td>
                                <a href="{{ route('backend.bank.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('backend.bank.delete', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin hapus data ini ?')" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data bank belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@endsection