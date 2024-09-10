@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="hero-section text-center position-relative">
        <img src="path-to-your-image/coffee-shop-hero.jpg" alt="Coffee Shop" class="img-fluid w-100" style="max-height: 500px; object-fit: cover;">
        <div class="hero-text position-absolute top-50 start-50 translate-middle text-black">
            {{-- <h3 class="display-4">Selamat Datang di Coffee Shop Kami</h3> --}}
            <h1 class="lead">Nikmati kopi terbaik dengan suasana yang nyaman</h1>
            <a href="#our-menu" class="btn btn-primary mt-3">Lihat Menu Kami</a>
        </div>
    </div>

    <!-- About Us Section -->
    <section class="about-us-section text-center my-5">
        <h2 class="mb-4">Tentang Kami</h2>
        <p class="lead">Kami menyajikan kopi berkualitas dari biji kopi pilihan, dengan pelayanan ramah di tempat yang nyaman. Datang dan nikmati secangkir kopi terbaik dari barista kami.</p>
    </section>

    <!-- Menu Section -->
    <section id="our-menu" class="menu-section my-5">
        <h2 class="text-center mb-4">Menu Kami</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <img src="path-to-your-image/coffee-1.jpg" alt="Espresso" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Espresso</h5>
                <p>Aroma kuat dan rasa khas dari biji kopi pilihan.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="path-to-your-image/coffee-2.jpg" alt="Cappuccino" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Cappuccino</h5>
                <p>Perpaduan sempurna antara kopi, susu, dan buih lembut.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('resources/img/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
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
