<?php

class Login_C {

    public function CekLogin() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['Email'] ?? '';
            $password = $_POST['Pass'] ?? '';

            if ($email == '' || $password == '') {
                echo "Email dan Password harus diisi";
            } else {
                echo "Login berhasil diproses";
            }

        } else {
            echo "Silakan gunakan formulir login";
        }
    }
}

$login = new Login_C();

$method = $_GET['method'] ?? '';

if ($method == 'CekLogin') {
    $login->CekLogin();
} else {
    echo "Method tidak ditemukan. CekLogin";
}

?>