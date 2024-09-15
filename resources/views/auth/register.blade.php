<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">

                        <div class="card card-primary">
                            <div class="card-header text-center">
                                <h4>Daftar</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <div class="invalid-feedback">
                                            Tolong masukan nama anda
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <div class="invalid-feedback">
                                            Tolong masukan email anda
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="d-block">Kata sandi</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            Tolong masukan kata sandi anda
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password2" class="d-block">Konfirmasi Kata sandi</label>
                                        <input id="password2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <div class="invalid-feedback">
                                            Tolong konfirmasi kata sandi anda
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Daftar
                                        </button>
                                        <div class="mt-5 text-muted text-center">
                            Sudah memiliki akun? <a href="{{ route('login') }}">Login</a>
                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>
