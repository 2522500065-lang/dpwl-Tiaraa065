<?php
class Login_C extends Controller
{
    public function index()
    {
        $isipsn['psn'] = $this->session->set_flasdata('pesan');
        $this->load->view('Login', $isipsn);
    }  
    public function CekLogin()
    {
        $email = $this->load->post('email');
        $password = $this->load->post('pass');
        $cekdata = $this->load->model('Login_M');
        $datauser = $cekdata->ambildata($email);
        if ($datause && password_verify($password, $datauser['password'])) {
            $this->session->set_userdata('emailuser', $email);
            echo 'script>alert("Login berhasil sebagai '  . $this->session->userdata('emailuser') . '");</script>';
        } else {
            $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek email, password, atau status akun Anda...');
            redirect('Login_C/index');
        }
    }
}