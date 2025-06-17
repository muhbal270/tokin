@extends ('frontend.layouts.app')

@section('content')
    <!-- hero -->
    <div class="hero">
        <div class="hero-text">
            <div class="content">
                <h1>Top Up Game jadi <i><b>EASY!</b></i></h1>
                <a class="btn btn-outline-light" href="./game.html">Belanja Sekarang</a>
            </div>
            <footer>Copyright &copy; Tokin Under Sydemy | Video Source : Mobile Legends</footer>
        </div>
        <video autoplay muted loop id="bg-video">
            <source src="./assets/video.mp4" type="video/mp4" />
        </video>
    </div>
@endsection