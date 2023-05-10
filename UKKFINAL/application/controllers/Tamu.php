<?php

class Tamu extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'judul' => 'HOTEL HEBAT',
            'user' => $this->db->get('user')->result(),
            'nav' => 'Nav/tamu',
            'isi' => 'Tamu/home'
        );

        $this->load->view('Tamu/index', $data);
    }

    public function fu()
    {
        $data = array(
            'title' => 'Fasilitas Umum',
            'judul' => 'FASILITAS UMUM',
            'user' => $this->db->get('fu')->result(),
            'nav' => 'Nav/tamu',
            'isi' => 'Tamu/fu'
        );

        $this->load->view('Tamu/index', $data);
    }

    public function kamar()
    {
        $data = array(
            'title' => 'Kamar',
            'judul' => 'KAMAR',
            'user' => $this->db->get('kamar')->result(),
            'nav' => 'Nav/tamu',
            'isi' => 'Tamu/kamar'
        );

        $this->load->view('Tamu/index', $data);
    }

    public function booking()
    {
        $data = array(
            'title' => 'Booking',
            'judul' => 'BOOKING',
            'user' => $this->db->get('user')->result(),
            'nav' => 'Nav/tamu',
            'isi' => 'Tamu/booking'
        );

        $this->load->view('Tamu/index', $data);
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
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Berhasil Dipesan!</div>');
        redirect('Tamu/booking');
    }

    public function pesanan()
    {
        $data = array(
            'title' => 'Pesanan',
            'judul' => 'PESANAN ANDA',
            'user' => $this->db->get_where('rsv', array('nama_tamu' => $this->session->userdata('nama')))->result(),
            'nav' => 'Nav/tamu',
            'isi' => 'Tamu/pesanan'
        );

        $this->load->view('Tamu/index', $data);
    }

    public function print($id)
    {
        $data = array(
            'title' => 'Cetak',
            'judul' => 'HOTEL HEBAT',
            'user' => $this->db->get_where('rsv', array('id_rsv' => $id))->result()
        );

        $this->load->view('Tamu/print', $data);
    }
}
