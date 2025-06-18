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
                        <form action="{{ route('login') }}">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Alamat Email</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
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