<?php
class Penyewa_C071 extends Controller
{
    // Menampilkan data penyewa
    public function index()
    {
        $model = $this->load->model('Penyewa_M071');

        $dt['dtpenyewa'] = $model->datapenyewa();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('penyewaview071', $dt);
        $this->load->view('layout/footer');
    }

    // Menampilkan form tambah penyewa
    public function create_penyewa()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('create_penyewaview071');
        $this->load->view('layout/footer');
    }

    // Menampilkan form edit penyewa
    public function edit_penyewa()
    {
        $user = $this->load->get('user_plq071');

        if (empty($user)) {
            $this->pesanKembali('Username penyewa tidak ditemukan!');
            return;
        }

        $model = $this->load->model('Penyewa_M071');
        $dt['penyewa'] = $model->ambilpenyewa($user);

        if (!$dt['penyewa']) {
            $this->pesanKembali('Data penyewa tidak ditemukan!');
            return;
        }

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('edit_penyewaview071', $dt);
        $this->load->view('layout/footer');
    }

    // Proses menyimpan data penyewa
    public function simpan()
    {
        $model = $this->load->model('Penyewa_M071');

        $user = trim($this->load->post('user_plq071'));
        $nik = trim($this->load->post('Nik071'));

        if (empty($user) || empty($nik)) {
            $this->pesanKembali('Username dan NIK wajib diisi!');
            return;
        }

        if ($model->cekuser($user)) {
            $this->pesanKembali('Username sudah digunakan!');
            return;
        }

        if ($model->ceknik($nik)) {
            $this->pesanKembali('NIK sudah terdaftar!');
            return;
        }

        $ft_ktp = $this->uploadFoto('ft_ktp');
        $ft_sim_a = $this->uploadFoto('ft_sim_a');

        if (!$ft_ktp || !$ft_sim_a) {
            $this->pesanKembali('Foto KTP dan SIM A wajib diunggah!');
            return;
        }

        $data = [
            'user_plq071' => $user,
            'Sandi071' => $this->load->post('Sandi071'),
            'Nik071' => $nik,
            'nm_lngkp071' => $this->load->post('nm_lngkp071'),
            'no_hp071' => $this->load->post('no_hp071'),
            'almt_lngkp071' => $this->load->post('almt_lngkp071'),
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        if ($model->simpan($data)) {
            redirect('Penyewa_C071/index');
        } else {
            $this->pesanKembali('Gagal menyimpan data penyewa!');
        }
    }

    // Proses mengubah data penyewa
    public function update_penyewa()
    {
        $model = $this->load->model('Penyewa_M071');

        $user_lama = $this->load->post('user_lama');

        if (empty($user_lama)) {
            $this->pesanKembali('Username lama tidak ditemukan!');
            return;
        }

        $penyewa = $model->ambilpenyewa($user_lama);

        if (!$penyewa) {
            $this->pesanKembali('Data penyewa tidak ditemukan!');
            return;
        }

        $nik = trim($this->load->post('Nik071'));

        if ($nik !== $penyewa['Nik071'] && $model->ceknik($nik)) {
            $this->pesanKembali('NIK sudah digunakan penyewa lain!');
            return;
        }

        $ft_ktp = $penyewa['ft_ktp'];
        $ft_sim_a = $penyewa['ft_sim_a'];

        $foto_ktp_baru = $this->uploadFoto('ft_ktp');
        $foto_sim_baru = $this->uploadFoto('ft_sim_a');

        if ($foto_ktp_baru) {
            $ft_ktp = $foto_ktp_baru;
        }

        if ($foto_sim_baru) {
            $ft_sim_a = $foto_sim_baru;
        }

        $data = [
            'Sandi071' => $this->load->post('Sandi071'),
            'Nik071' => $nik,
            'nm_lngkp071' => $this->load->post('nm_lngkp071'),
            'no_hp071' => $this->load->post('no_hp071'),
            'almt_lngkp071' => $this->load->post('almt_lngkp071'),
            'ft_ktp' => $ft_ktp,
            'ft_sim_a' => $ft_sim_a
        ];

        if ($model->update($data, $user_lama)) {
            if ($foto_ktp_baru) {
                $this->hapusFotoLama($penyewa['ft_ktp']);
            }

            if ($foto_sim_baru) {
                $this->hapusFotoLama($penyewa['ft_sim_a']);
            }

            redirect('Penyewa_C071/index');
        } else {
            $this->pesanKembali('Gagal mengubah data penyewa!');
        }
    }

    // Proses menghapus data penyewa
    public function hapus_penyewa()
    {
        $user = $this->load->post('user_plq071');

        if (empty($user)) {
            $this->pesanKembali('Username penyewa tidak ditemukan!');
            return;
        }

        $model = $this->load->model('Penyewa_M071');
        $penyewa = $model->ambilpenyewa($user);

        if (!$penyewa) {
            $this->pesanKembali('Data penyewa tidak ditemukan!');
            return;
        }

        if ($model->hapus($user)) {
            $this->hapusFotoLama($penyewa['ft_ktp']);
            $this->hapusFotoLama($penyewa['ft_sim_a']);

            redirect('Penyewa_C071/index');
        } else {
            $this->pesanKembali('Gagal menghapus data penyewa!');
        }
    }

    // Upload foto KTP dan SIM A
    private function uploadFoto($namaField)
    {
        if (
            !isset($_FILES[$namaField]) ||
            $_FILES[$namaField]['error'] === UPLOAD_ERR_NO_FILE
        ) {
            return null;
        }

        if ($_FILES[$namaField]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $ekstensi = strtolower(
            pathinfo($_FILES[$namaField]['name'], PATHINFO_EXTENSION)
        );

        $ekstensiValid = ['jpg', 'jpeg', 'png'];

        if (!in_array($ekstensi, $ekstensiValid)) {
            return null;
        }

        $folder = __DIR__ . '/../img/';

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        $namaFile = $namaField . '_' . uniqid() . '.' . $ekstensi;

        if (move_uploaded_file(
            $_FILES[$namaField]['tmp_name'],
            $folder . $namaFile
        )) {
            return $namaFile;
        }

        return null;
    }

    // Menghapus foto lama
    private function hapusFotoLama($namaFile)
    {
        if (empty($namaFile)) {
            return;
        }

        $path = __DIR__ . '/../img/' . basename($namaFile);

        if (file_exists($path)) {
            unlink($path);
        }
    }

    // Menampilkan pesan dan kembali ke halaman sebelumnya
    private function pesanKembali($pesan)
    {
        echo "<script>
            alert(" . json_encode($pesan) . ");
            history.back();
        </script>";
    }
}
