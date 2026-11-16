<?php
class Login_C extends Controller
{
    public function index()
    {
        // Mengambil pesan flashdata agar alert error bisa muncul di halaman login
        $dt['psn'] = $this->session->flashdata('pesan');
        $this->load->view('v_login', $dt);
    }

    public function CekLogin()
    {
        $email = $this->load->post('email'); 
        $password = $this->load->post('pass');
        
        $cekdata = $this->load->model('Login_M');
        $datauser = $cekdata->ambildata($email);
        
        // Cek password baik dalam bentuk plaintext maupun hash
        if ($datauser && ($password == $datauser['password'] || password_verify($password, $datauser['password']))) {
            $this->session->set_userdata('username', $email);
            $this->session->set_flashdata('pesan', 'Login berhasil sebagai ' . $email);
            redirect('Admin_C/index');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek email atau password Anda!');
            redirect('Login_C/index');
        }
    }

    public function keluar()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('emailuser');
        $this->session->set_flashdata('pesan', 'Berhasil Logout');
        redirect('Login_C/index');
        exit;
    }
}