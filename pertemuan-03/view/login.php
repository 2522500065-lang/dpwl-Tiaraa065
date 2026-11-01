<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">

<div class="login-box">

    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>

    <?php
    if (!empty($psn)) {
        echo "<script>alert('" . $psn . "');</script>";
    }
    ?>

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">
                Sign in to start your session
            </p>

            <form action="<?= base_url('Login_c/CekLogin') ?>" method="post">

                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control"
                           name="email"
                           placeholder="Email"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           class="form-control"
                           name="password"
                           placeholder="Password"
                           required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                    </div>

                    <div class="col-4">
                        <button type="submit"
                                class="btn btn-primary btn-block">
                            Login
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>

</div>

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>

</body>
</html>