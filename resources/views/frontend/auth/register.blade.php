@extends ('frontend.layouts.app')

@section ('content')
    <!-- register -->
    <div class="register">
        <div class="container text-center">
            <div class="bg-register">
                <div class="overlay"></div>
            </div>
            <div class="row  d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="content">
                        <h1>Buat Akun</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Aria Jhon">
                                <label for="floatingInput">Nama Lengkap</label>
                                @error('name')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="floatingInput" placeholder="08123456789">
                                <label for="floatingInput">Nomor Whatsapp</label>
                                @error('phone')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Alamat Email</label>
                                @error('email')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Buat Password</label>
                                @error('password')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Konfirmasi Password</label>
                                @error('password')
                                    <div class="text-danger text-start">
                                        <i class="fa-solid fa-triangle-exclamation"></i> {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-light w-100 mt-3 mb-5">Daftar</button>
                        </form>
                    </div>
                    <div class="row mt-5">
                        <div class="col">
                            <h5>Sudah punya Akun?</h5>
                            <a href="{{ route('login') }}" class="btn btn-secondary w-100">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection