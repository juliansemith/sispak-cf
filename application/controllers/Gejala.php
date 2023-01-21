<?php

class Gejala extends CI_Controller
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

        $data['judul'] = "Data Gejala";
        $data['gejala'] = $this->db->query("SELECT * FROM gejala ORDER BY kode_gejala ASC")->result_array();
        if ($this->input->post('keyword')) {
            $data['gejala'] = $this->M_data->cari_gejala();
        }
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pakar/gejala/list', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambah_aksi()
    {
        $kode_gejala = $this->input->post('kode_gejala');
        $nama_gejala = $this->input->post('nama_gejala');

        $data = array(
            'kode_gejala' => $kode_gejala,
            'nama_gejala' => $nama_gejala
        );

        // insert ke database
        $this->M_data->insert_data($data, 'gejala');

        // alihkan ke halaman gejala
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'gejala');
    }

    public function edit($id)
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('id' => $id);
        $data['judul'] = "Edit Data Gejala";
        // ambil data dari db sesuai id
        $data['gejala'] = $this->M_data->edit_data($where, 'gejala')->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pakar/gejala/edit', $data);
        $this->load->view('templates/v_footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $kode_gejala = $this->input->post('kode_gejala');
        $nama_gejala = $this->input->post('nama_gejala');

        $where = array(
            'id' => $id
        );

        $data = array(
            'id' => $id,
            'kode_gejala' => $kode_gejala,
            'nama_gejala' => $nama_gejala
        );

        // insert ke database
        $this->M_data->update_data($where, $data, 'gejala');

        // alihkan ke halaman gejala
        $this->session->set_flashdata('flash', ' diupdate.');
        redirect(base_url() . 'gejala');
    }

    public function hapus($id)
    {
        $where = array(
            'id' => $id
        );

        // hapus data gejala dari db sesuai id
        $this->M_data->delete_data($where, 'gejala');

        // redirect kembali ke halaman gejala
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'gejala');
    }

    public function cetak()
    {
        $data['judul'] = "Laporan Data Gejala";
        $data['gejala'] = $this->db->get('gejala')->result_array();

        $this->load->view('pakar/gejala_cetak', $data);
    }
}
