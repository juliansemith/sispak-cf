<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load model gejala 
        $this->load->model('M_data');
    }

    public function index()
    {
        $data['judul'] = "Login | Sistem Pakar Mendiagnosa Kerusakan Komputer";
        $this->load->view('templates/v_login_header', $data);
        $this->load->view('login/index', $data);
        $this->load->view('templates/v_login_footer');
    }

    // validasi login
    public function login_aksi()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sebagai = $this->input->post('sebagai');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {
            $where = array(
                'username' => $username,
                'password' => sha1($password)
            );

            if ($sebagai == "admin") {
                $cek = $this->M_data->cek_login('pengguna', $where)->num_rows();
                $data = $this->M_data->cek_login('pengguna', $where)->row();

                if ($cek > 0) {
                    $data_session = array(
                        'id_admin' => $data->id_admin,
                        'username' => $data->username,
                        'status' => 'admin_login'
                    );

                    $this->session->set_userdata($data_session);

                    redirect(base_url() . 'admin');
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
            } else if ($sebagai == "pakar") {
                $cek = $this->M_data->cek_login('pengguna', $where)->num_rows();
                $data = $this->M_data->cek_login('pengguna', $where)->row();

                if ($cek > 0) {
                    $data_session = array(
                        'id_pakar' => $data->id_pakar,
                        'username' => $data->username,
                        'nama' => $data->nama,
                        'status' => 'pakar_login'
                    );

                    $this->session->set_userdata($data_session);
                    redirect(base_url() . 'pakar');
                } else {
                    redirect(base_url() . 'login?alert=gagal');
                }
            }
        } else {
            $this->load->view('v_login');
        }
    }
}
