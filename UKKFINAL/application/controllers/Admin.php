<?php

class Admin extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'User',
            'judul' => 'USER',
            'user' => $this->db->get('user')->result(),
            'nav' => 'Nav/admin',
            'isi' => 'Admin/admin'
        );

        $this->load->view('Admin/index', $data);
    }

    public function tambah()
    {
        $data = array(
            'title' => 'Tambah User',
            'judul' => 'TAMBAH USER',
            'user' => $this->db->get('user')->result(),
            'nav' => 'Nav/admin',
            'isi' => 'Admin/tambah'
        );

        $this->load->view('Admin/index', $data);
    }


    public function simpan()
    {
        $config['upload_path'] = './assets/images/user/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        $foto = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];

        if ($ukuran > 0) {
            $this->upload->do_upload('foto');
        } else {
            $foto = 'kosong.jpg';
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'no_hp' => $this->input->post('no_hp'),
            'level' => $this->input->post('level'),
            'foto' => $foto
        );

        $this->db->insert('user', $data);
        redirect('Admin');
    }

    public function edit($id)
    {
        $data = array(
            'title' => 'Edit User',
            'judul' => 'EDIT USER',
            'user' => $this->db->get_where('user', array('id_user' => $id))->result(),
            'nav' => 'Nav/admin',
            'isi' => 'Admin/edit'
        );

        $this->load->view('Admin/index', $data);
    }

    public function update()
    {
        $config['upload_path'] = './assets/images/user/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload', $config);

        $foto = $_FILES['foto']['name'];
        $ukuran = $_FILES['foto']['size'];

        if ($ukuran > 0) {
            $this->upload->do_upload('foto');
        } else {
            $foto = $this->input->post('txtfoto');
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'password' => $this->input->post('password'),
            'no_hp' => $this->input->post('no_hp'),
            'level' => $this->input->post('level'),
            'foto' => $foto
        );

        $where = array(
            'id_user' => $this->input->post('id_user')
        );

        $this->db->where($where);
        $this->db->update('user', $data);
        redirect('Admin');
    }

    public function delete($id)
    {
        $this->db->delete('user', array('id_user' => $id));
        redirect('Admin');
    }
}
