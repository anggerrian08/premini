@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Hero Section -->
    <div class="hero-section text-center position-relative">
         <a href="#our-menu" class="btn btn-primary mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                </svg>
                Lihat Menu Kami
            </a>
        {{-- </div> --}}
    </div>



    <!-- Menu Section -->
    <section id="our-menu" class="menu-section my-5">
        <h2 class="text-center mb-4">Menu Kami</h2>
        <div class="row text-center">
            <!-- Menu Item 1: Espresso -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/espresso.jpeg') }}" alt="espresso" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Espresso</h5>
                <p>Aroma kuat dan rasa khas dari biji kopi pilihan.</p>
            </div>
            <!-- Menu Item 2: Cappuccino -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/Cappuccino.jpeg') }}" alt="Cappuccino" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Cappuccino</h5>
                <p>Perpaduan sempurna antara kopi, susu, dan buih lembut.</p>
            </div>
            <!-- Menu Item 3: Latte -->
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
            </div>
            <div class="col-md-4 mb-4">
                <img src="{{ asset('foto/latte.jpeg') }}" alt="Latte" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                <h5>Latte</h5>
                <p>Kombinasi kopi halus dengan susu yang creamy.</p>
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
