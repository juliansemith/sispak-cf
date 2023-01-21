<?php

class Pakar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load model gejala 
        $this->load->model('M_data');

        // cek session login, jika session status tidak sama dengan session pakar_login, maka halaman akan redirect ke halaman login
        if ($this->session->userdata('status') != "pakar_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Sistem Pakar Diagnosa Kerusakan Komputer";
        $data['title'] = "Sistem Pakar Diagnosa Kerusakan Komputer";
        $this->load->view('templates/v_header', $data);
        $this->load->View('templates/v_sidebar', $data_session);
        $this->load->view('pakar/index', $data);
        $this->load->view('templates/v_footer');
    }

    public function dashboard()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data = array(
            'jumlah_pengguna' => $this->db->get('pengguna')->result_array(),
            'jumlah_gejala' => $this->db->get('gejala')->result_array(),
            'jumlah_kerusakan' => $this->db->get('kerusakan')->result_array()
        );
        $data['judul'] = "Dashboard | Sistem Pakar Certainty Factor";
        $data['title'] = "Dashboard";
        $this->load->view('templates/v_header', $data);
        $this->load->View('templates/v_sidebar', $data_session);
        $this->load->view('pakar/dashboard', $data);
        $this->load->view('templates/v_footer');
    }

    public function ganti_password()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Ganti Password";
        $this->load->view('templates/v_header', $data);
        $this->load->View('templates/v_sidebar', $data_session);
        $this->load->view('pakar/ganti_password', $data);
        $this->load->view('templates/v_footer');
    }

    public function ganti_password_aksi()
    {
        $baru = $this->input->post('password_baru');
        $ulang = $this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('kode_user');

            $where = array('kode_user' => $id);

            $data = array('password' => sha1($baru));

            $this->M_data->update_data($where, $data, 'pengguna');
            redirect(base_url() . 'pakar/ganti_password/?alert=sukses');
        } else {
            $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

            $data['judul'] = "Ganti Password";
            $this->load->view('templates/v_header', $data);
            $this->load->View('templates/v_sidebar', $data_session);
            $this->load->view('pakar/ganti_password', $data);
            $this->load->view('templates/v_footer');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login?alert=logout');
    }
}
