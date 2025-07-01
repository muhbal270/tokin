@extends ('frontend.layouts.app')

@section('content')
    <!-- game -->
    <div class="product">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5">
                    <h1>Game Pilihan Populer</h1>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <hr class="text-light">
                </div>
            </div>

            <div class="row mt-3">
                @forelse ($products as $item)
                    <div class="col-lg-4">
                        <a href="{{ route('frontend.orders.index') }}">
                            <figure class="item">
                                <img style="max-height: 200px; object-fit: cover;" src="{{ asset('storage/products/' . $item->image) }}" alt="{{ $item->title }}">
                                <figcaption class="text-white">{{ $item->title }}</figcaption>
                            </figure>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        Belum ada produk yang tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

@endsection