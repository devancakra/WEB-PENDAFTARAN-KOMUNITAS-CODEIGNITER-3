<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //Method Global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RoboticsModel', 'admin');
        $this->load->library('pagination');
    }

    //Method Kelola
    public function kelola()
    {
        //search
        $submit = $this->input->post('submit');
        $keyword = $this->input->post('keyword');
 
        if ($submit){
            $robotics['keyword'] = $keyword;
            $this->session->set_flashdata('msg',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><h5>Pemberitahuan Sistem :</h5></strong>
                Data&nbsp;<strong>berhasil</strong>&nbsp;ditemukan !!...
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } 
        else{
            $robotics['keyword'] = null;
        }

        //data & pagination
        $config = [
            'base_url' => 'https://pfm-c-18081010013-devancakramw.000webhostapp.com/admin/kelola',
            'total_rows' => $this->admin->countAllData(),
            'per_page' => 5,
            'num_links' => 2
        ];

        $this->pagination->initialize($config);

        $data = [
            'judul' => 'Kelola | Robotics Community',
            'start' => $this->uri->segment(3)
        ];

        $data['robotics'] = $this->admin->getData($config['per_page'], $data['start'], $robotics['keyword']);

        $this->load->view('layout/header2', $data);
        $this->load->view('menuadmin/kelola', $data);
        $this->load->view('layout/footer');
    }

    //Method Create
    public function create()
    {
        $this->admin->createData();
        $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><h5>Pemberitahuan Sistem :</h5></strong>
            Data&nbsp;<strong>berhasil</strong>&nbsp;ditambahkan !!...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('admin/kelola'));
    }

    //Method Update
    public function update($id)
    {
        $this->admin->updateData($id);
        $this->session->set_flashdata('msg',
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong><h5>Pemberitahuan Sistem :</h5></strong>
            Data&nbsp;<strong>berhasil</strong>&nbsp;diubah !!...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect(base_url('admin/kelola'));
    }

    //Method Delete
    public function delete($id)
    {
        $this->admin->deleteData($id);
        $this->admin->getReset();
        $this->session->set_flashdata('msg',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><h5>Pemberitahuan Sistem :</h5></strong>
            Data&nbsp;<strong>berhasil</strong>&nbsp;dihapus !!...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect(base_url('admin/kelola'));
    }

    //Method Export Excel
    public function excel()
    {
        $data = [
            'judul' => 'Export Excel | Robotics Community',
            'robotics' => $this->admin->getAllData()
        ];

        $this->load->view('menuadmin/excel', $data);
    }

    //Method Print
    public function print()
    {
        $data = [
            'judul' => 'Print Data | Robotics Community',
            'robotics' => $this->admin->getAllData()
        ];

        $this->load->view('menuadmin/print', $data);
    }

    //Method Logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'msg',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><h5>Pemberitahuan Sistem :</h5></strong>
                    Anda telah&nbsp;<strong>Logout</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
        );

        redirect(base_url('menu/login'));
    }

    //Method Manage
    public function manage()
    {
        $email = $this->input->post('email');
        $users = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($users['is_active'] == 1 && $users['role_id'] == 1) {
            $data = [
                'email' => $users['email'],
                'role_id' => $users['role_id']
            ];

            $this->session->set_userdata($data);

            redirect(base_url('admin/kelola'));
        } else {
            $this->logout();
        }
    }
}