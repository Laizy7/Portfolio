<?php

class FU extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Fasilitas Umum',
            'judul' => 'FASILITAS UMUM',
            'user' => $this->db->get('fu')->result(),
            'nav' => 'Nav/admin',
            'isi' => 'FU/fu'
        );

        $this->load->view('FU/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'title' => 'Tambah Fasilitas Umum',
            'judul' => 'TAMBAH FASILITAS UMUM',
            'user' => $this->db->get('fu')->result(),
            'nav' => 'Nav/admin',
            'isi' => 'FU/tambah'
        );

        $this->load->view('FU/index', $data);
    }

    public function simpan()
    {
        $config['upload_path'] = './assets/images/fu/';
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
            'nama_fu' => $this->input->post('nama_fu'),
            'keterangan' => $this->input->post('keterangan'),
            'gambar' => $gambar
        );

        $this->db->insert('fu', $data);
        redirect('FU');
    }

    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Fasilitas Umum',
            'judul' => 'EDIT FASILITAS UMUM',
            'user' => $this->db->get_where('fu', array('id_fu' => $id))->result(),
            'nav' => 'Nav/admin',
            'isi' => 'FU/edit'
        );

        $this->load->view('FU/index', $data);
    }

    public function update()
    {
        $config['upload_path'] = './assets/images/fu/';
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
            'nama_fu' => $this->input->post('nama_fu'),
            'keterangan' => $this->input->post('keterangan'),
            'gambar' => $gambar
        );

        $where = array(
            'id_fu' => $this->input->post('id_fu')
        );

        $this->db->where($where);
        $this->db->update('fu', $data);
        redirect('FU');
    }

    public function delete($id)
    {
        $this->db->delete('fu', array('id_fu' => $id));
        redirect('FU');
    }
}