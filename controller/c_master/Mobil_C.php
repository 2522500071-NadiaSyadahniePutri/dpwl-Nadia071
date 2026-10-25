<?php
class Mobil_C extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dtmobil'] = $cekdata->datamobil();
        // Ambil nama pengguna dari session
        $dt['nm_user'] = $_SESSION['nm_user'] ?? 'Admin';
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $dt);
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }
}