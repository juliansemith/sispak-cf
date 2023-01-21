<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }
    public function index()
    {
        $data['title'] = "Sistem Pakar Mendiagnosa Kerusakan Komputer";
        $this->load->view('templates/user/home/header', $data);
        $this->load->view('templates/user/home/sidebar');
        $this->load->view('templates/user/home/index', $data);
        $this->load->view('templates/user/home/footer');
    }

    public function dashboard()
    {
        $data_session['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();

        $data = array(
            'jumlah_gejala' => $this->db->get('gejala')->result_array(),
            'jumlah_kerusakan' => $this->db->get('kerusakan')->result_array()
        );
        $data['judul'] = "Dashboard | Sistem Pakar Certainty Factor";
        $data['title'] = "Dashboard";
        $this->load->view('templates/user/home/header', $data);
        $this->load->view('templates/user/home/sidebar');
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/user/home/footer');
    }

    public function diagnosa()
    {
        if (!$this->input->post('gejala')) {
            $data['title'] = "Sistem Pakar Mendiagnosa Kerusakan Komputer";
            $this->load->view('templates/user/home/header', $data);
            $this->load->view('templates/user/home/sidebar');
            $this->load->view('user/diagnosa');
            $this->load->view('templates/user/home/footer');
        } else {
            $gejala = implode(",", $this->input->post('gejala'));
            $data['listGejala'] = $this->M_data->get_list_by_id($gejala);
            // hitung
            $listKerusakan = $this->M_data->get_by_gejala($gejala);
            $kerusakan = array();
            $i = 0;
            foreach ($listKerusakan->result() as $value) {
                $listGejala = $this->M_data->get_gejala_by_kerusakan($value->kerusakan_id, $gejala);
                $combineCFmb = 0;
                $combineCFmd = 0;
                $CFBefore = 0;
                $j = 0;
                foreach ($listGejala->result() as $value2) {
                    $j++;
                    if ($j == 3) {
                        $combineCFmb = $value2->mb;
                        $combineCFmd = $value2->md;
                    } else {
                        $combineCFmb = $combineCFmb + ($value2->mb * (1 - $combineCFmb));
                        $combineCFmd = $combineCFmd + ($value2->md * (1 - $combineCFmd));
                        $combinehasil = $combineCFmb - $combineCFmd;
                    }
                }
                if ($combinehasil) {
                    $kerusakan[$i] = array(
                        'kode_kerusakan' => $value->kode_kerusakan,
                        'nama_kerusakan' => $value->nama_kerusakan,
                        'kepercayaan' => $combinehasil * 100,
                        'keterangan' => $value->keterangan,
                        'solusi' => $value->solusi
                    );
                    $i++;
                }
            }

            // insert ke tabel history
            $insert_data = array();
            foreach ($this->input->post("gejala") as $g) {
                $insert_data[] = array(
                    'gejala_id' => $g
                );
            }

            $this->db->insert_batch('history', $insert_data);

            function cmp($a, $b)
            {
                return ($a["kepercayaan"] > $b["kepercayaan"]) ? -1 : 1;
            }
            usort($kerusakan, "cmp");
            $data['listKerusakan'] = $kerusakan;
            $data_hasil = array(
                'kode_kerusakan' => $kerusakan[0]['kode_kerusakan'],
                'nama_kerusakan' => $kerusakan[0]['nama_kerusakan'],
                'kepercayaan' => $kerusakan[0]['kepercayaan'],
                'keterangan' => $kerusakan[0]['keterangan'],
                'solusi' => $kerusakan[0]['solusi']
            );

            $this->db->insert('hasil_diagnosa', $data_hasil);
            $data['title'] = "Hasil Diagnosa | Sistem Pakar Mendiagnosa Kerusakan Komputer";
            $this->load->view('templates/user/home/header', $data);
            $this->load->view('templates/user/home/sidebar');
            $this->load->view('user/hasil_diagnosa', $data);
            $this->load->view('templates/user/home/footer');
        }
    }
}
