<?php
class Penyewa_C065 extends Controller
{
    public function index()
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $cekdata = $this->load->model('m_master/Penyewa_M065');
        $dt['dbpenyewa'] = $cekdata->datapenyewa();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/penyewaview065', $dt);
        $this->load->view('layout/footer');
    }

    public function create_penyewa065()
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview065');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $penyewa     = $this->load->model('m_master/Penyewa_M065');
        $user_plg065 = $this->load->post('user_plg065');

        if ($penyewa->cekuser($user_plg065)) {
            echo "<script>
                alert('Username sudah ada, silahkan gunakan Username lain');
                window.history.back();
            </script>";
            exit;
        }

        $target_folder = dirname(__DIR__, 2) . '/img/';
        if (!is_dir($target_folder)) {
            mkdir($target_folder, 0777, true);
        }

        $files = [
            'ft_ktp'   => 'KTP',
            'ft_sim_a' => 'SIM_A'
        ];

        $nama_file_db = [];
        $clean_user   = str_replace([' ', '/'], '_', $user_plg065);

        foreach ($files as $field_name => $prefix) {
            if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
                $nmgambar = $_FILES[$field_name]['tmp_name'];
                $ekstensi = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
                $allowed  = ['jpg', 'jpeg', 'png'];

                if (in_array($ekstensi, $allowed)) {
                    $filename   = $prefix . '_' . $clean_user . '.' . $ekstensi;
                    $target_dir = $target_folder . $filename;

                    move_uploaded_file($nmgambar, $target_dir);
                    $nama_file_db[$field_name] = $filename;
                } else {
                    echo "<script>
                        alert('Format file $prefix harus JPG, JPEG, atau PNG!');
                        window.history.back();
                    </script>";
                    exit;
                }
            } else {
                $nama_file_db[$field_name] = '';
            }
        }

        $data = [
            'user_plg065'   => $user_plg065,
            'Sandi065'      => $this->load->post('Sandi065'),
            'Nik065'        => $this->load->post('Nik065'),
            'nm_lngkp065'   => $this->load->post('nm_lngkp065'),
            'no_hp065'      => $this->load->post('no_hp065'),
            'almt_lngkp065' => $this->load->post('almt_lngkp065'),
            'ft_ktp'        => $nama_file_db['ft_ktp'],
            'ft_sim_a'      => $nama_file_db['ft_sim_a']
        ];

        $simpan = $penyewa->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil disimpan!');
                window.location.href = '" . base_url('Penyewa_C065/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($user_plg065)
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $penyewa       = $this->load->model('m_master/Penyewa_M065');
        $dt['penyewa'] = $penyewa->detailpenyewa($user_plg065);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview065', $dt);
        $this->load->view('layout/footer');
    }

    public function UpdatePenyewa()
    {
        $penyewa     = $this->load->model('m_master/Penyewa_M065');
        $user_plg065 = $this->load->post('user_plg065');

        $ft_ktp_asli   = $this->load->post('ft_ktp_asli');
        $ft_sim_a_asli = $this->load->post('ft_sim_a_asli');
        $target_folder = dirname(__DIR__, 2) . '/img/';

        if (isset($_FILES['ft_ktp']) && $_FILES['ft_ktp']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar = $_FILES['ft_ktp']['tmp_name'];
            $ekstensi = strtolower(pathinfo($_FILES['ft_ktp']['name'], PATHINFO_EXTENSION));
            if (in_array($ekstensi, ['jpg', 'png', 'jpeg'])) {
                $ft_ktp     = 'KTP_' . $user_plg065 . '.' . $ekstensi;
                $target_dir = $target_folder . $ft_ktp;
                move_uploaded_file($nmgambar, $target_dir);
            } else {
                $ft_ktp = $ft_ktp_asli;
            }
        } else {
            $ft_ktp = $ft_ktp_asli;
        }

        if (isset($_FILES['ft_sim_a']) && $_FILES['ft_sim_a']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar = $_FILES['ft_sim_a']['tmp_name'];
            $ekstensi = strtolower(pathinfo($_FILES['ft_sim_a']['name'], PATHINFO_EXTENSION));
            if (in_array($ekstensi, ['jpg', 'png', 'jpeg'])) {
                $ft_sim_a   = 'SIM_A_' . $user_plg065 . '.' . $ekstensi;
                $target_dir = $target_folder . $ft_sim_a;
                move_uploaded_file($nmgambar, $target_dir);
            } else {
                $ft_sim_a = $ft_sim_a_asli;
            }
        } else {
            $ft_sim_a = $ft_sim_a_asli;
        }

        $data = [
            'user_plg065'   => $user_plg065,
            'Sandi065'      => $this->load->post('Sandi065'),
            'Nik065'        => $this->load->post('Nik065'),
            'nm_lngkp065'   => $this->load->post('nm_lngkp065'),
            'no_hp065'      => $this->load->post('no_hp065'),
            'almt_lngkp065' => $this->load->post('almt_lngkp065'),
            'ft_ktp'        => $ft_ktp,
            'ft_sim_a'      => $ft_sim_a
        ];

        $simpan = $penyewa->UbahDtPenyewa($data);
        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil diubah!');
                window.location.href = '" . base_url('Penyewa_C065/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal diubah!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($user_plg065)
    {
        $penyewa       = $this->load->model('m_master/Penyewa_M065');
        $dt['Penyewa'] = $penyewa->detailpenyewa($user_plg065);
        $ft_ktp   = $dt['Penyewa']['ft_ktp065'] ?? '';
        $ft_sim_a = $dt['Penyewa']['ft_sim_a065'] ?? '';

        $hapus = $penyewa->HapusDtPenyewa($user_plg065);
        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';
            $gambar = [$ft_ktp, $ft_sim_a];
            foreach ($gambar as $file) {
                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }
            echo "<script>
                alert('Data penyewa berhasil dihapus!');
                window.location.href = '" . base_url('Penyewa_C065/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal dihapus!');
                window.history.back();
            </script>";
        }
    }
}