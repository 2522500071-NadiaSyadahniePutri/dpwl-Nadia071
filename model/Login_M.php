function ambildata($email)
{
    $dtdatmin = $this->db->prepare(
        "SELECT username, password, status_akun
         FROM admin
         WHERE username = ? AND status_akun = 'Aktif'"
    );

    $dtdatmin->bind_param("s", $email);
    $dtdatmin->execute();

    return $dtdatmin->get_result()->fetch_assoc();
}