<?php
class Latihan1Controller extends Controller
{
    public function index()
    {
        // Ambil data mahasiswa dari model
        $data['datamhs'] = $this->load->model('Latihan1Model')->getAllMhs();

        // Simpan nama user ke session
        $this->session->set_userdata('nmuser', 'Fakhril');
        $data['nama_user'] = $this->session->userdata('nmuser');

        // Kirim data ke view
        $this->load->view('latihan1view', $data);
    }
}
