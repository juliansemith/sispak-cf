<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load model gejala 
        $this->load->model('M_data');
        // cek session login, jika session status tidak sama dengan session admin_login, maka halaman akan redirect ke halaman login
        if ($this->session->userdata('status') != "admin_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Sistem Pakar Diagnosa Kerusakan Komputer";
        $data['title'] = "Sistem Pakar Diagnosa Kerusakan Komputer";
        $this->load->view('templates/admin/v_header', $data);
        $this->load->view('templates/admin/v_sidebar', $data_session);
        $this->load->view('admin/index');
        $this->load->view('templates/admin/v_footer');
    }

    public function dashboard()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data = array(
            'jumlah_gejala' => $this->db->get('gejala')->result_array(),
            'jumlah_kerusakan' => $this->db->get('kerusakan')->result_array(),
            'jumlah_diagnosa' => $this->db->get('hasil_diagnosa')->result_array(),
        );
        $data['judul'] = "Dashboard | Sistem Pakar Certainty Factor";
        $data['title'] = "Dashboard";
        $this->load->view('templates/admin/v_header', $data);
        $this->load->view('templates/admin/v_sidebar', $data_session);
        $this->load->view('admin/dashboard');
        $this->load->view('templates/admin/v_footer');
    }

    public function LihatDataGejala()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['gejala'] = $this->M_data->get_data('gejala')->result_array();
        $data['judul'] = "Lihat Data Gejala | Sistem Pakar Certainty Factor";
        $data['title'] = "Lihat Data Gejala";
        if ($this->input->post('keyword')) {
            $data['gejala'] = $this->M_data->cari_gejala();
        }
        $this->load->view('templates/admin/v_header', $data);
        $this->load->view('templates/admin/v_sidebar', $data_session);
        $this->load->view('admin/gejala', $data);
        $this->load->view('templates/admin/v_footer');
    }

    public function LihatDataKerusakan()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['kerusakan'] = $this->M_data->get_data('kerusakan')->result_array();
        $data['judul'] = "Lihat Data Gejala | Sistem Pakar Certainty Factor";
        $data['title'] = "Lihat Data Gejala";
        if ($this->input->post('keyword')) {
            $data['kerusakan'] = $this->M_data->cari_kerusakan();
        }
        $this->load->view('templates/admin/v_header', $data);
        $this->load->view('templates/admin/v_sidebar', $data_session);
        $this->load->view('admin/kerusakan', $data);
        $this->load->view('templates/admin/v_footer');
    }

    public function ganti_password()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Ganti Password";
        $this->load->view('templates/admin/v_header', $data);
        $this->load->view('templates/admin/v_sidebar', $data_session);
        $this->load->view('admin/ganti_password', $data);
        $this->load->view('templates/admin/v_footer');
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
            redirect(base_url() . 'admin/ganti_password/?alert=sukses');
        } else {
            $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

            $data['judul'] = "Ganti Password";
            $this->load->view('templates/admin/v_header', $data);
            $this->load->view('templates/admin/v_sidebar', $data_session);
            $this->load->view('admin/ganti_password', $data);
            $this->load->view('templates/admin/v_footer');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login?alert=logout');
    }
}
