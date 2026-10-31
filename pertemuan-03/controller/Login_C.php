<?php
class Login_C extends controller
{
    public function index()
    {
        $this->load->view('login');
    }
    public function CekLogin()
    {
        $email = $_POST['2522500065@mahasiswa.atmaluhur.ac.id'];
        $password = $_POST['tiara28062007'];
        echo "Email" . $email . " dan " . $password . " Password Anda";
    }
}