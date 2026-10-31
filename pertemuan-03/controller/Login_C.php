<?php
class Login_C extends controller
{
    public function index()
    {
        $this->load->view('login');
    }
    public function CekLogin()
    {
        $email = $_POST['Email'];
        $password = $_POST['Pass'];
        echo "Email" . $email . " dan " . $password . " Password Anda";
    }
}