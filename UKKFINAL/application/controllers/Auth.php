<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Login',
            'judul' => 'LOGIN',
            'isi' => 'Auth/login',
        );

        $this->load->view('Auth/index', $data);
    }

    public function login()
    {
        $nama = $this->input->post('nama');
        $password = $this->input->post('password');
        $login = $this->user->login($nama, $password, 'user');

        if ($login->num_rows() > 0) {
            $user = $login->result();

            $nama = $user[0]->nama;
            $level = $user[0]->level;
            $no_hp = $user[0]->no_hp;
            $foto = $user[0]->foto;

            $this->session->set_userdata('nama', $nama);
            $this->session->set_userdata('level', $level);
            $this->session->set_userdata('no_hp', $no_hp);
            $this->session->set_userdata('foto', $foto);

            if ($this->session->userdata('level') == 'Admin') {
                redirect('Admin');
            } else if ($this->session->userdata('level') == 'Resepsionis') {
                redirect('Rsp');
            } else if ($this->session->userdata('level') == 'Tamu') {
                redirect('Tamu');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Akun Tidak Valid!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Akun Tidak Valid!</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('no_hp');
        $this->session->unset_userdata('foto');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Log Out!</div>');
        redirect('Auth');
    }
}
