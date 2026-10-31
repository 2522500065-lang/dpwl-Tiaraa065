<?php

class Login_C
{
    public function index()
    {
        require_once 'view/login.php';
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (
            $email == '2522500065@mahasiswa.atmaluhur.ac.id' &&
            $password == 'tiara28062007'
        ) {
            echo "Login Berhasil";
        } else {
            echo "Email atau Password Salah";
        }
    }
}