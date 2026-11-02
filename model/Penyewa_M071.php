
<?php
class Penyewa_M071 extends Model
{
    // Menampilkan seluruh data penyewa
    public function datapenyewa()
    {
        $sql = "SELECT * FROM penyewa ORDER BY user_plq071 ASC";
        $query = $this->db->query($sql);

        return $query->fetch_all(MYSQLI_ASSOC);
    }

    // Mengecek username penyewa
    public function cekuser($user)
    {
        $sql = "SELECT * FROM penyewa WHERE user_plq071 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Mengecek NIK penyewa
    public function ceknik($nik)
    {
        $sql = "SELECT * FROM penyewa WHERE Nik071 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nik);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Menyimpan data penyewa
    public function simpan($data)
    {
        $sql = "INSERT INTO penyewa
                (user_plq071, Sandi071, Nik071, nm_lngkp071,
                 no_hp071, almt_lngkp071, ft_ktp, ft_sim_a)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param(
            "ssssssss",
            $data['user_plq071'],
            $data['Sandi071'],
            $data['Nik071'],
            $data['nm_lngkp071'],
            $data['no_hp071'],
            $data['almt_lngkp071'],
            $data['ft_ktp'],
            $data['ft_sim_a']
        );

        return $stmt->execute();
    }

    // Mengambil data penyewa berdasarkan username
    public function ambilpenyewa($user)
    {
        $sql = "SELECT * FROM penyewa WHERE user_plq071 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Mengubah data penyewa
    public function update($data, $user_lama)
    {
        $sql = "UPDATE penyewa SET
                Sandi071 = ?,
                Nik071 = ?,
                nm_lngkp071 = ?,
                no_hp071 = ?,
                almt_lngkp071 = ?,
                ft_ktp = ?,
                ft_sim_a = ?
                WHERE user_plq071 = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->bind_param(
            "ssssssss",
            $data['Sandi071'],
            $data['Nik071'],
            $data['nm_lngkp071'],
            $data['no_hp071'],
            $data['almt_lngkp071'],
            $data['ft_ktp'],
            $data['ft_sim_a'],
            $user_lama
        );

        return $stmt->execute();
    }

    // Menghapus data penyewa
    public function hapus($user)
    {
        $sql = "DELETE FROM penyewa WHERE user_plq071 = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $user);

        return $stmt->execute();
    }
}
