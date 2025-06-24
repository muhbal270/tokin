@extends ('frontend.layouts.app')

@section('content')
    <!-- login -->
    <div class="login">
        <div class="container text-center">
            <div class="bg-login">
                <div class="overlay"></div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="content">
                        <h1>Masuk ke Tokin</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Alamat Email</label>
                                @error('email')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-light w-100 mt-3 mb-5">Masuk</button>
                        </form>
                        <a href="" class="text-secondary">Lupa Password?</a>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h5>Belum punya Akun?</h5>
                            <a href="{{ route('register') }}" class="btn btn-secondary w-100">Buat Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection