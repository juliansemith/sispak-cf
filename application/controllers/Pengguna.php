<?php

class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load model gejala 
        $this->load->model('M_data');
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        // / mengambil data dari database
        $data['judul'] = "Data Pengguna | SIPMKK";
        $data['pengguna'] = $this->M_data->get_data('pengguna')->result_array();
        if ($this->input->post('keyword')) {
            $data['pengguna'] = $this->M_data->cari_pengguna();
        }
        $this->load->view('templates/admin/v_header', $data);
        $this->load->view('templates/admin/v_sidebar', $data_session);
        $this->load->view('admin/pengguna/list', $data);
        $this->load->view('templates/admin/v_footer');
    }

    public function tambah_aksi()
    {
        $kode_user = $this->input->post('kode_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $data = array(
            'kode_user' => $kode_user,
            'nama' => $nama,
            'username' => $username,
            'password' => sha1($password),
            'level' => $level
        );

        // Insert datanya ke database
        $this->M_data->insert_data($data, 'pengguna');
        // lalu redirect
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'pengguna');
    }

    public function edit($id)
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('kode_user' => $id);
        $data['judul'] = "Edit Data Pengguna";
        // Ambil data dari db sesuai id
        $data['pengguna'] = $this->M_data->edit_data($where, 'pengguna')->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pakar/pengguna/edit', $data);
        $this->load->view('templates/v_footer');
    }

    public function update()
    {
        $kode_user = $this->input->post('kode_user');
        $username = $this->input->post('username');
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $where = array(
            'kode_user' => $kode_user
        );

        // cek form password diisi atau tidak
        if ($password == "") {
            $data = array(
                'username' => $username,
                'nama' => $nama,
                'level' => $level
            );

            // lalu update ke db
            $this->M_data->update_data($where, $data, 'pengguna');
        } else {
            $data = array(
                'username' => $username,
                'nama' => $nama,
                'password' => sha1($password),
                'level' => $level
            );

            // lalu update ke db
            $this->M_data->update_data($where, $data, 'pengguna');
        }
        // alihkan ke halaman pengguna
        $this->session->set_flashdata('flash', ' diupdate.');
        redirect(base_url() . 'pengguna');
    }

    public function hapus($id)
    {
        $where = array(
            'kode_user' => $id
        );

        // hapus data gejala dari db sesuai id
        $this->M_data->delete_data($where, 'pengguna');

        // redirect kembali ke halaman pengguna
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'pengguna');
    }
}
