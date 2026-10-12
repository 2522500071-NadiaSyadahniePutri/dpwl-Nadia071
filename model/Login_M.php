
<?php
class Login_M extends Model
{
    function ambildata($email)
    {
        $dtdatmin = $this->db->prepare("select username, password, status_akun
            from admin where username=? and password=? and status_Akun='Aktif'");
        $dtdatmin->bind_param("s", $email);
        $dtdatmin->execute();
        return $dtdatmin->get_result()->fetch_assoc();
    }
}
