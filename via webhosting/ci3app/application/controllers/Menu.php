<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    //Method Global
    public function __construct()
    {
        parent::__construct();
        $this->load->model('RoboticsModel', 'menu');
        $this->load->library('pagination');
    }

    //Method Index
    public function index()
    {
        $data = [
            'judul' => 'Robotics Community'
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('main/index');
        $this->load->view('layout/footer');
    }

    //Method Tentang
    public function tentang()
    {
        $data = [
            'judul' => 'Tentang | Robotics Community'
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('main/tentang');
        $this->load->view('layout/footer');
    }

    //Method Pendaftaran
    public function pendaftaran()
    {
        $data = [
            'judul' => 'Pendaftaran | Robotics Community',
        ];

        $this->session->set_userdata($data);

        $this->load->view('layout/header1', $data);
        $this->load->view('main/pendaftaran');
        $this->load->view('layout/footer');
    }

    //Method List Pendaftaran
    public function listpendaftaran()
    {
        //search
        $submit = $this->input->post('submit');
        $keyword = $this->input->post('keyword');

        if ($submit) {
            $robotics['keyword'] = $keyword;
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><h5>Pemberitahuan Sistem :</h5></strong>
                Data&nbsp;<strong>berhasil</strong>&nbsp;ditemukan !!...
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
        } else {
            $robotics['keyword'] = null;
        }

        //data & pagination
        $config = [
            'base_url' => 'https://pfm-c-18081010013-devancakramw.000webhostapp.com/menu/listpendaftaran',
            'total_rows' => $this->menu->countAllData(),
            'per_page' => 5,
            'num_links' => 2
        ];
        
        $this->pagination->initialize($config);

        $data = [
            'judul' => 'List Anggota Baru | Robotics Community',
            'start' => $this->uri->segment(3),
        ];

        $data['robotics'] = $this->menu->getData($config['per_page'], $data['start'], $robotics['keyword']);

        $this->load->view('layout/header', $data);
        $this->load->view('main/listpendaftaran', $data);
        $this->load->view('layout/footer');
    }
    
    //Method Login
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',[
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email salah!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required',[
            'required' => 'Password tidak valid!',
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'judul' => 'Login | Robotics Community'
            ];
    
            $this->load->view('layout/header', $data);
            $this->load->view('auth/login');
            $this->load->view('layout/footer');
        }
        else{
            $this->loginnext();
        }
    }

    //Method Login Next
    private function loginnext(){
        $email = $this->input->post('email');
        $users = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($users['is_active'] == 1 && $users['role_id'] == 1) {
            $data = [
                'email' => $users['email'],
                'role_id' => $users['role_id']
            ];

            $this->session->set_userdata($data);
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><h5>Pemberitahuan Sistem :</h5></strong>
                    Selamat datang&nbsp;<strong>Admin</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );

            redirect(base_url('admin/kelola'));
        } 
        else if ($users['is_active'] == 1 && $users['role_id'] == 2) {
            $data = [
                'email' => $users['email'],
                'role_id' => $users['role_id']
            ];

            $this->session->set_userdata($data);
            $this->session->set_flashdata(
                'msg',
                '<br><div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><h5>Pemberitahuan Sistem :</h5></strong>
                    Selamat datang&nbsp;<strong>Member</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect(base_url('menu/pendaftaran'));
        } 
        else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><h5>Pemberitahuan Sistem :</h5></strong>
                            Data&nbsp;<strong>tidak valid</strong>&nbsp;sehingga tidak dapat diakses !!...
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
            );

            redirect(base_url('menu/login'));
        }            
    }

    //Method Registration
    public function registration()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
            'required' => 'Email harus diisi!',
            'valid_email' => 'Email tidak valid, coba lagi!',
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu sedikit!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[5]|matches[password1]',[
            'required' => 'Password harus diisi!',
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu sedikit!'
        ]);

        if($this->form_validation->run() == false){
            $data = [
                'judul' => 'Registrasi Akun | Robotics Community'
            ];
    
            $this->load->view('layout/header', $data);
            $this->load->view('auth/registration');
            $this->load->view('layout/footer');
        }
        else{
            $this->menu->newmember();
            $this->session->set_flashdata('msg',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><h5>Pemberitahuan Sistem :</h5></strong>
                Anda&nbsp;<strong>berhasil</strong>&nbsp;registrasi, login sekarang !!...
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );

            redirect(base_url('menu/login'));
        }
    }

    //Method Add
    public function add()
    {
        $this->menu->createData();
        $this->session->set_flashdata('msg',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><h5>Pemberitahuan Sistem :</h5></strong>
            Data&nbsp;<strong>berhasil</strong>&nbsp;ditambahkan !!...
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect(base_url('menu/listpendaftaran'));
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

    //Method Registry
    public function registry()
    {
        $email = $this->input->post('email');
        $users = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($users['is_active'] == 1 && $users['role_id'] == 2) {
            $data = [
                'email' => $users['email'],
                'role_id' => $users['role_id']
            ];

            $this->session->set_userdata($data);
            
            redirect(base_url('menu/pendaftaran'));
        } 
        else {
            $this->logout();
        }
    }
}