<?php
class Login_C extends controller
{
    public function index()
    {
        $this->load->view('login');
    }
    public function ceklogin()
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        echo "Email" . $email . " dan " . $password . " Password Anda";
    }
}