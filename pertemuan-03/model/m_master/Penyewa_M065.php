<?php
class Penyewa_M065 extends Model
{
    public function datapenyewa()
    {
        $dbpenyewa =$this->db->prepare("SELECT user_plg065, Sandi065, Nik065, nm_lngkp065, no_hp065, almt_lngkp065, ft_ktp065, ft_sim_a065 FROM penyewa");
        $dbpenyewa->execute();
        return $dbpenyewa->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function cekuser($user_plg065)
    {
        $cekuser =$this->db->prepare("SELECT user_plg065 FROM penyewa WHERE user_plg065=?");
        $cekuser->bind_param("s", $user_plg065);$cekuser->execute();
        $hasil =$cekuser->get_result();
        return $hasil->num_rows > 0;
    }

    public function simpan($data)
    {
        $sql =$this->db->prepare("INSERT INTO penyewa (user_plg065, Sandi065, Nik065, nm_lngkp065, no_hp065, almt_lngkp065, ft_ktp065, ft_sim_a065) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $sql->bind_param(
            "ssssssss",
            $data['user_plg065'],$data['Sandi065'],
            $data['Nik065'],$data['nm_lngkp065'],
            $data['no_hp065'],$data['almt_lngkp065'],
            $data['ft_ktp'],$data['ft_sim_a']
        );

        return $sql->execute();
    }

    public function detailpenyewa($user_plg065)
    {
        $sql =$this->db->prepare(
            "SELECT user_plg065, Sandi065, Nik065, nm_lngkp065, no_hp065, almt_lngkp065, ft_ktp065, ft_sim_a065 
            FROM penyewa 
            WHERE user_plg065=?"
        );
        $sql->bind_param("s", $user_plg065);$sql->execute();
        return $sql->get_result()->fetch_assoc();
    }

    public function UbahDtPenyewa($data)
    {
        $stmt =$this->db->prepare("UPDATE penyewa SET Sandi065 = ?, Nik065 = ?, nm_lngkp065 = ?, no_hp065 = ?, almt_lngkp065 = ?, ft_ktp065 = ?, ft_sim_a065 = ? WHERE user_plg065 = ?");

        $stmt->bind_param(
            "ssssssss",
            $data['Sandi065'],$data['Nik065'],
            $data['nm_lngkp065'],$data['no_hp065'],
            $data['almt_lngkp065'],$data['ft_ktp'],
            $data['ft_sim_a'],$data['user_plg065']
        );

        $hasil = $stmt->execute();$stmt->close();
        return $hasil;
    }

    public function HapusDtPenyewa($user_plg065)
    {
        $dtpenyewa =$this->db->prepare("DELETE FROM penyewa WHERE user_plg065 = ?");
        $dtpenyewa->bind_param("s", $user_plg065);$hasil = $dtpenyewa->execute();$dtpenyewa->close();
        return $hasil;
    }
}