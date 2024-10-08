<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Masuk</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">

    <!-- Custom CSS to center the card -->
    <style>
        .centered-card {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensure the card is vertically centered */
        }

        .card-primary {
            width: 100%;
            max-width: 400px; /* Limit the card width */
            margin-top: 50px; /* Adjust the spacing from the top */
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container centered-card">
                <div class="card card-primary">
                    <div class="card-header text-center">
                        <h4>Masuk</h4>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required autofocus>
                                <div class="invalid-feedback">
                                    Tolong masukkan email Anda
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Kata sandi</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                <div class="invalid-feedback">
                                    Tolong masukkan kata sandi Anda
                                </div>
                                <a href="auth-forgot-password.html" class="text-small">Lupa kata sandi?</a>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Belum punya akun? <a href="register">Buat akun</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
