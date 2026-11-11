<?php
class Login_M extends Model
{
    public function ambildata($email, $pass)
    {
        $dtadmin = $this->db->prepare("select email,password, status_akun from admin where email=? and status_Akun='aktif'");
        $dtadmin->bind_param("s", $email, $pass);
        $dtadmin->execute();
        return  $dtadmin->get_result()->fetch_assoc();
    }
}