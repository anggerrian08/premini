@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="hero-section text-center position-relative">
        {{-- <img src="path-to-your-image/coffee-shop-hero.jpg" alt="Coffee Shop" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
        <div class="hero-text position-absolute top-50 start-50 translate-middle text-black"> --}}
            {{-- <h3 class="display-4">Selamat Datang di Coffee Shop Kami</h3> --}}
            {{-- <h1 class="display-20">Nikmati kopi terbaik dengan suasana yang nyaman</h1> --}}
            <a href="#our-menu" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>Lihat Menu Kami</a>
        </div>
    </div>

    <!-- About Us Section -->
    {{-- <section class="about-us-section text-center my-5">
        <h2 class="mb-4">Tentang Kami</h2>
        <p class="lead">Kami menyajikan kopi berkualitas dari biji kopi pilihan, dengan pelayanan ramah di tempat yang nyaman. Datang dan nikmati secangkir kopi terbaik dari barista kami.</p>
    </section> --}}

    <!-- Menu Section -->
    <section id="our-menu" class="menu-section my-5">
        <h2 class="text-center mb-4">Menu Kami</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/espresso.jpeg') }}" alt="espresso" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Espresso</h5>
                <p>Aroma kuat dan rasa khas dari biji kopi pilihan.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/Cappuccino.jpeg') }}" alt="Cappucino" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Cappuccino</h5>
                <p>Perpaduan sempurna antara kopi, susu, dan buih lembut.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center py-3">
        <small class="text-muted">© {{ date('Y') }} Coffee Shop. Semua hak dilindungi.</small>
    </footer>
</div>
@endsection
