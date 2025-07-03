@extends ('backend.layouts.app', ['title' => 'Create Topup Option'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Topup Option</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('backend.topup.store') }}" method="POST" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Pilih Game</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected disabled>-- Pilih Game --</option>
                                                    <option value="1">One</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Title</label>
                                                <input type="text" id="title" class="form-control @error('title') is-invalid
                                                @enderror" name="title" placeholder="Contoh : 💎 100 Diamonds">
                                                @error('title')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Jumlah</label>
                                                <input type="number" id="jumlah" class="form-control @error('jumlah') is-invalid
                                                @enderror" name="jumlah" placeholder="Contoh : 100 ">
                                                @error('jumlah')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Price</label>
                                                <input type="number" id="price" class="form-control @error('price') is-invalid
                                                @enderror" name="price" placeholder="Contoh : 50000 ">
                                                @error('price')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Position</label>
                                                <input type="number" id="position" class="form-control @error('position') is-invalid
                                                @enderror" name="position" placeholder="Contoh : 1">
                                                @error('position')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <a href="{{ route('backend.topup.index') }}"
                                                class="btn btn-light-secondary me-1 mb-1">Close</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection