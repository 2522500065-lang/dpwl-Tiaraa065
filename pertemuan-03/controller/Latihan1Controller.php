<?php
//require_once 'model/Latihan1Model.php';
class Latihan1Controller extends Controller
{
    public function index()
    {
    $data['datamhs'] = $this->load->model('Latihan1Model')->getAllMhs();
    $this->session->set_userdata('nmuser', 'Fakhri');
    $data['nama_user'] = $this->session->userdata('nmuser');
    $this->load->view('Latihan1View', $data);
    }
}
