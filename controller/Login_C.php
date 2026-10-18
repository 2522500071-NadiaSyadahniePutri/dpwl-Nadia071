<?php
class Login_C extends Controller
{
    public function index()
    {
        $sisipn['psn'] = $this->session->set_flashdata('pesan');
        $this->load->view('login', $sisipn);
    }

   
public function CekLogin()
{
    $email = $this->load->post('email');
    $password = $this->load->post('pass');

    $cekdata = $this->load->model('Login_M');
    $datauser = $cekdata->ambildata($email);

    echo "<pre>";
    echo "Input email diterima: ";
    var_dump(!empty($email));
    echo "Input password diterima: ";
    var_dump(!empty($password));
    echo "Data user ditemukan: ";
    var_dump((bool) $datauser);

    if ($datauser) {
        echo "Password cocok: ";
        var_dump(password_verify($password, $datauser['password']));
    }

    echo "</pre>";
    exit;
}

}