<?php
require_once 'model/Latihan1Model.php';
class Latihan1Controller
{
    public function index()
    {
        // Simpan data ke session
        $this->session->set_userdata('nmuser', 'Fakhril');

        // Ambil data dari session
        $data['nama_user'] = $this->session->userdata('nmuser');

        // Ambil data mahasiswa dari model
        $data['datamhs'] = $this->load->model('Latihan1Model')->getAllMhs();

        // Kirim ke view
        $this->load->view('latihan1view', $data);
    }
}
