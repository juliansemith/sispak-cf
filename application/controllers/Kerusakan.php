<?php

class Kerusakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('status') != "pakar_login") {
        //     redirect(base_url() . 'login?alert=belum_login');
        // }
        // load model kerusakan
        $this->load->model('M_data');
    }

    public function index()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data['judul'] = "Data Kerusakan Komputer";
        $data['kerusakan'] = $this->M_data->get_data('kerusakan')->result_array();
        if ($this->input->post('keyword')) {
            $data['kerusakan'] = $this->M_data->cari_kerusakan();
        }
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pakar/kerusakan/list', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambah_aksi()
    {
        $kode_kerusakan = $this->input->post('kode_kerusakan');
        $nama_kerusakan = $this->input->post('nama_kerusakan');
        $keterangan = $this->input->post('keterangan');
        $solusi = $this->input->post('solusi');

        $data = array(
            'kode_kerusakan' => $kode_kerusakan,
            'nama_kerusakan' => $nama_kerusakan,
            'keterangan' => $keterangan,
            'solusi' => $solusi
        );

        // insert ke database
        $this->M_data->insert_data($data, 'kerusakan');

        // alihkan ke halaman kerusakan
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'kerusakan');
    }

    public function edit($id)
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('id' => $id);
        $data['judul'] = 'Edit Data Kerusakan';
        // ambil data dari db sesuai id
        $data['kerusakan'] = $this->M_data->edit_data($where, 'kerusakan')->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pakar/kerusakan/edit', $data);
        $this->load->view('templates/v_footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kode_kerusakan = $this->input->post('kode_kerusakan');
        $nama_kerusakan = $this->input->post('nama_kerusakan');
        $keterangan = $this->input->post('keterangan');
        $solusi = $this->input->post('solusi');

        $where = array(
            'id' => $id
        );

        $data = array(
            'id' => $id,
            'kode_kerusakan' => $kode_kerusakan,
            'nama_kerusakan' => $nama_kerusakan,
            'keterangan' => $keterangan,
            'solusi' => $solusi
        );

        // insert ke database
        $this->M_data->update_data($where, $data, 'kerusakan');

        // alihkan ke halaman kerusakan
        $this->session->set_flashdata('flash', ' diupdate.');
        redirect(base_url() . 'kerusakan');
    }

    public function hapus($id)
    {
        $where = array(
            'id' => $id
        );

        // hapus data gejala dari db sesuai id
        $this->M_data->delete_data($where, 'kerusakan');

        // redirect kembali ke halaman gejala
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'kerusakan');
    }
}
