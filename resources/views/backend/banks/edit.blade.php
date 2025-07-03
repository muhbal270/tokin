@extends ('backend.layouts.app', ['title' => 'Edit Template'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Bank Account</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="POST" action="{{ route('backend.bank.update', $bank->id) }}" enctype="multipart/form-data" class="form form-vertical">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Bank Name</label>
                                                <input type="text" id="bank_name" class="form-control @error('bank_name') is-invalid
                                                @enderror" name="bank_name" value="{{ old('bank_name', $bank->bank_name) }}" required>
                                                @error('bank_name')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Account Number</label>
                                                <input type="number" id="account_number" class="form-control @error('account_number') is-invalid
                                                @enderror" name="account_number" value="{{ old('account_number', $bank->account_number) }}" required>
                                                @error('account_number')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Account Name</label>
                                                    <input type="text" id="account_name" class="form-control @error('account_name') is-invalid
                                                    @enderror" name="account_name" value="{{ old('account_name', $bank->account_name) }}" required>
                                                    @error('account_name')
                                                        <div class="text-danger text-start">
                                                            <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="formFile">Image</label>
                                                        <input type="file" id="image" class="form-control @error('image') is-invalid
                                                        @enderror" name="image" placeholder="Image">
                                                        @error('image')
                                                            <div class="text-danger text-start">
                                                                <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                        @enderror
                                                        @if ($bank->image)
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/banks/' . $bank->image) }}" alt="{{ $bank->bank_name }}" width="100">
                                                            </div>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <a href="{{ route('backend.bank.index') }}"
                                                            class="btn btn-light-secondary me-1 mb-1">Close</a>
                                                    </div>
                                                </div>
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