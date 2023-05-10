<?php

class Kamar extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Kamar',
            'judul' => 'KAMAR',
            'user' => $this->db->get('kamar')->result(),
            'nav' => 'Nav/admin',
            'isi' => 'Kamar/kamar'
        );

        $this->load->view('Kamar/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'title' => 'Tambah Kamar',
            'judul' => 'TAMBAH KAMAR',
            'user' => $this->db->get('kamar')->result(),
            'nav' => 'Nav/admin',
            'isi' => 'Kamar/tambah'
        );

        $this->load->view('Kamar/index', $data);
    }

    public function simpan()
    {
        $config['upload_path'] = './assets/images/kamar/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        $gambar = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];

        if ($ukuran > 0) {
            $this->upload->do_upload('gambar');
        } else {
            $gambar = 'kosong.jpg';
        }

        $data = array(
            'tipe_kamar' => $this->input->post('tipe_kamar'),
            'fasilitas' => $this->input->post('fasilitas'),
            'jumlah' => $this->input->post('jumlah'),
            'gambar' => $gambar
        );

        $this->db->insert('kamar', $data);
        redirect('Kamar');
    }

    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Kamar',
            'judul' => 'EDIT KAMAR',
            'user' => $this->db->get_where('kamar', array('id_kamar' => $id))->result(),
            'nav' => 'Nav/admin',
            'isi' => 'Kamar/edit'
        );

        $this->load->view('Kamar/index', $data);
    }

    public function update()
    {
        $config['upload_path'] = './assets/images/kamar/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        $gambar = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];

        if ($ukuran > 0) {
            $this->upload->do_upload('gambar');
        } else {
            $gambar = $this->input->post('txtgambar');
        }

        $data = array(
            'tipe_kamar' => $this->input->post('tipe_kamar'),
            'fasilitas' => $this->input->post('fasilitas'),
            'jumlah' => $this->input->post('jumlah'),
            'gambar' => $gambar
        );

        $where = array(
            'id_kamar' => $this->input->post('id_kamar')
        );

        $this->db->where($where);
        $this->db->update('kamar', $data);
        redirect('Kamar');
    }

    public function delete($id)
    {
        $this->db->delete('kamar', array('id_kamar' => $id));
        redirect('Kamar');
    }
}