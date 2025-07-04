@extends ('backend.layouts.app', ['title' => 'Data Products'])

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Products</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary">
                    <a href="{{ route('backend.product.create') }}" class="text-white">Create Data</a>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $item)
                        <tr>
                            <td>{{ $products->firstItem() + $loop->index }}</td>
                            <td><img src="{{ asset('storage/products/' . $item->image) }}" alt="{{  $item->title }}" width="80"></td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ route('backend.product.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                <form action="{{ route('backend.product.delete', $item->id) }}" method="POST" style="display: inline;">
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
                            <td colspan="4" class="text-center">Data produk belum tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@endsection