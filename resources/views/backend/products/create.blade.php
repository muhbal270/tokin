@extends ('backend.layouts.app', ['title' => 'Create Product'])

@section('content')

    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('backend.product.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Image</label>
                                                <input type="file" name="image" id="image" class="form-control" >
                                                @error('image')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1" class="form-label">Title</label>
                                                <textarea class="form-control @error('title') is-invalid
                                                @enderror" name="title" id="title"
                                                    rows="3"></textarea>
                                                @error('title')
                                                    <div class="text-danger text-start">
                                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <a href="{{ route('backend.product.index') }}"
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