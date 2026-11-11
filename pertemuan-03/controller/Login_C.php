<?php
class Login_C extends Controller
{
    public function index()
    {
        $dt['psn'] = $this->session->flashdata('pesan');
        $this->load->view('v_login', $dt);
    }

    public function CekLogin()
    {
        // 1. Ambil input dari form POST
        $username = $_POST['username'] ?? ''; 
        $password = $_POST['password'] ?? '';
        
        // 2. Inisialisasi Model Login_M
        $cekdata  = new Login_M();
        $datauser = $cekdata->ambildata($username);
        
        // 3. Tampilkan data untuk debugging
        echo "<pre>";
        echo "<b>Username Input Form:</b> " . htmlspecialchars($username) . "<br>";
        echo "<b>Password Input Form:</b> " . htmlspecialchars($password) . "<br><br>";
        echo "<b>Data dari Database (Tabel 'admin'):</b><br>";
        var_dump($datauser);
        echo "</pre>";
        die(); // Hentikan eksekusi di sini untuk melihat hasilnya di browser

        if ($datauser && ($password == $datauser['password'] || password_verify($password, $datauser['password']))) {
            $this->session->set_userdata('username', $username);
            $this->session->set_flashdata('pesan', 'Login berhasil sebagai ' . $username);
            redirect('Admin_C/index');
        } else {
            $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek username atau password Anda!');
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