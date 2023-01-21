<?php

class M_data extends CI_Model
{
    public function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }

    public function cari_pengguna()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode_user', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('level', $keyword);
        return $this->db->get('pengguna')->result_array();
    }
    public function cari_gejala()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode_gejala', $keyword);
        $this->db->or_like('nama_gejala', $keyword);
        return $this->db->get('gejala')->result_array();
    }

    public function cari_kerusakan()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('kode_kerusakan', $keyword);
        $this->db->or_like('nama_kerusakan', $keyword);
        return $this->db->get('kerusakan')->result_array();
    }

    public function daftarNilaicf()
    {
        return $this->db->select('*, nilai_cf.id AS ncid')
            ->from('nilai_cf')
            ->join('gejala', 'gejala.id = nilai_cf.gejala_id')
            ->join('kerusakan', 'kerusakan.id = nilai_cf.kerusakan_id')
            ->order_by('nilai_cf.id', 'ASC')
            ->get()
            ->result_array();
    }

    public function getgejala()
    {
        return $this->db->query("SELECT * FROM gejala ORDER BY kode_gejala ASC");
    }

    public function getkerusakan()
    {
        return $this->db->get('kerusakan');
    }

    // nilai CF
    public function getById($id)
    {
        return $query = $this->db->query("SELECT *, a.id as ncid FROM nilai_cf a JOIN kerusakan b on b.id = a.kerusakan_id WHERE a.id='$id' ")->row_array();
    }

    public function get_by_gejala($gejala)
    {
        $sql = "SELECT DISTINCT kerusakan_id, k.kode_kerusakan, k.nama_kerusakan, k.keterangan, k.solusi FROM nilai_cf nc INNER JOIN kerusakan k ON nc.kerusakan_id = k.id WHERE gejala_id in (" . $gejala . ") ORDER BY kerusakan_id, gejala_id";

        return $this->db->query($sql);
    }

    public function get_gejala_by_kerusakan($id, $gejala = null)
    {
        $sql = "select nilai_cf.gejala_id, mb, md from nilai_cf WHERE kerusakan_id = " . $id;
        if ($gejala != null)
            $sql = $sql . " and gejala_id in (" . $gejala . ")";
        $sql = $sql . " order by gejala_id";
        return $this->db->query($sql);
    }

    // Gejala
    public function get_by_kelompok($kelompok)
    {
    }

    public function get_list_by_id($id)
    {
        $sql = "SELECT id, kode_gejala, nama_gejala FROM gejala WHERE id in (" . $id . ")";
        return $this->db->query($sql);
    }
}
