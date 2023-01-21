<?php

class Nilai_cf extends CI_Controller
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


        // mengambil data peminjaman alat dari db
        $data['judul'] = "Data Nilai CF";

        // $data['nilai_cf'] = $this->db->query("SELECT * FROM nilai_cf, gejala, kerusakan WHERE gejala.id = nilai_cf.gejala_id AND kerusakan.id = nilai_cf.kerusakan_id ORDER BY nilai_cf.id")->result_array();
        $data['nilai_cf'] = $this->M_data->daftarNilaicf();
        if ($this->input->post('keyword')) {
            $data['pengguna'] = $this->m_data->cari_pengguna();
        }

        $this->load->view('templates/v_header', $data);
        $this->load->View('templates/v_sidebar', $data_session);
        $this->load->view('pakar/nilai_cf/list', $data);
        $this->load->view('templates/v_footer');
    }

    public function tambah_aksi()
    {
        $gejala_id = $this->input->post('gejala_id');
        $kerusakan_id = $this->input->post('kerusakan_id');
        $md = $this->input->post('md');
        $mb = $this->input->post('mb');

        $data = array(
            'gejala_id' => $gejala_id,
            'kerusakan_id' => $kerusakan_id,
            'md' => $md,
            'mb' => $mb
        );

        $this->M_data->insert_data($data, 'nilai_cf');

        // redirect ke halaman index
        $this->session->set_flashdata('flash', ' ditambahkan.');
        redirect(base_url() . 'nilai_cf');
    }

    public function edit($id)
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $where = array('id' => $id);
        $data['judul'] = 'Edit Nilai CF';
        // ambil data dari db sesuai id
        $data['nilai_cf'] = $this->M_data->getById($id);
        $data['gejala'] = $this->db->query("SELECT * FROM gejala ORDER BY id")->result_array();
        $data['kerusakan'] = $this->db->query("SELECT * FROM kerusakan ORDER BY id")->result_array();
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar', $data_session);
        $this->load->view('pakar/nilai_cf/edit', $data);
        $this->load->view('templates/v_footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $gejala_id = $this->input->post('gejala_id');
        $kerusakan_id = $this->input->post('kerusakan_id');
        $md = $this->input->post('md');
        $mb = $this->input->post('mb');

        $data = array(
            'gejala_id' => $gejala_id,
            'kerusakan_id' => $kerusakan_id,
            'md' => $md,
            'mb' => $mb,
        );

        $this->db->where('id', $id);
        $this->db->update('nilai_cf', $data);

        // redirect
        $this->session->set_flashdata('flash', ' diedit.');
        redirect(base_url() . 'nilai_cf');
    }

    public function hapus($id)
    {
        $where = array(
            'id' => $id
        );

        $this->M_data->delete_data($where, 'nilai_cf');

        // redirect kembali ke halaman gejala
        $this->session->set_flashdata('flash', ' dihapus.');
        redirect(base_url() . 'nilai_cf');
    }
}
