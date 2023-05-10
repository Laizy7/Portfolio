<?php

class Rsp extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Reservasi',
            'judul' => 'RESERVASI',
            'user' => $this->db->get('rsv')->result(),
            'nav' => 'Nav/rsp',
            'isi' => 'Rsp/rsp'
        );

        $this->load->view('Rsp/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'title' => 'Reservasi',
            'judul' => 'RESERVASI',
            'user' => $this->db->get('rsv')->result(),
            'nav' => 'Nav/rsp',
            'isi' => 'Rsp/tambah'
        );

        $this->load->view('Rsp/index', $data);
    }

    public function simpan()
    {
        $data = array(
            'nama_pemesan' => $this->input->post('nama_pemesan'),
            'no_hp' => $this->input->post('no_hp'),
            'nama_tamu' => $this->input->post('nama_tamu'),
            'tipe_kamar' => $this->input->post('tipe_kamar'),
            'jumlah' => $this->input->post('jumlah'),
            'check_in' => $this->input->post('check_in'),
            'check_out' => $this->input->post('check_out'),
            'tgl_dibuat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('rsv', $data);
        redirect('Rsp');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');

        $data = array(
            'title' => 'Reservasi',
            'judul' => 'RESERVASI',
            'user' => $this->user->get_keyword($keyword),
            'nav' => 'Nav/rsp',
            'isi' => 'Rsp/rsp'
        );

        $this->load->view('Rsp/index', $data);
    }

    public function detail($id)
    {
        $data = array(
            'title' => 'Reservasi',
            'judul' => 'DETAIL RESERVASI',
            'user' => $this->db->get_where('rsv', array('id_rsv' => $id))->result(),
            'nav' => 'Nav/rsp',
            'isi' => 'Rsp/detail'
        );

        $this->load->view('Rsp/index', $data);
    }

    public function checkin($id)
    {
        $data = array(
            'status' => 'Masuk'
        );

        $where = array(
            'id_rsv' => $id
        );

        $this->db->where($where);
        $this->db->update('rsv', $data);
        redirect('Rsp');
    }

    public function checkout($id)
    {
        $data = array(
            'status' => 'Keluar'
        );

        $where = array(
            'id_rsv' => $id
        );

        $this->db->where($where);
        $this->db->update('rsv', $data);
        redirect('Rsp');
    }

    public function delete($id)
    {
        $this->db->delete('rsv', array('id_rsv' => $id));
        redirect('Rsp');
    }
}
