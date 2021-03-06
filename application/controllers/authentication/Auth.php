<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('model_users');
        $this->load->library(array('form_validation', 'Recaptcha'));
    }

    public function cekAkun(){
        $username = $this->input->post('username',TRUE);
        $password = $this->input->post('password',TRUE);
        
            $query = $this->model_users->cekAkun($username, $password);
            if ($query === 1) {
                return "Username Tidak diTemukan!";
            } elseif ($query === 2) {
                return "Password Salah!";
            }
            else {
                //membuat session dengan nama userdata
                $userData = array(
                    'id_user' => $query->id_user,
                    'username' => $query->username,
                    'password' => $query->password,
                    'type' => $query->type,
                    'nickname' => $query->nickname,
                    'logged_in' => TRUE,
                );
                $this->session->set_userdata($userData);
                return TRUE;
            }
        
    }

    public function login(){
        //melakukan pengalihan halaman sesuai dengan typenya
        if ($this->session->userdata('type') == "admin"){redirect('admin/admin');}
        if ($this->session->userdata('type') == "member"){redirect('member/member');}
        if ($this->session->userdata('type') == "operator"){redirect('pimpinan/dashboard');}
        if ($this->session->userdata('type') == "pjbt_pk"){redirect('pimpinan/dashboard');}

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
        $this->load->model('Model_users');
        $this->form_validation->set_rules('username','Usernaem','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $error = $this->cekAkun();
            if ($this->form_validation->run() && $error === TRUE) {
                $recaptcha = $this->input->post('g-recaptcha-response');
                $response = $this->recaptcha->verifyResponse($recaptcha);
                if (isset($response['success']) and $response['success'] === true) {
                $data = $this->Model_users->cekAkun($this->input->post('username'), $this->input->post('password'));
                    //jika bernilai TRUE maka alihkan halaman sesuai dengan type nya
                    if($data->type == 'admin'){
                    redirect('admin/admin');
                    }
                    elseif ($data->type == 'operator') {
                    redirect('pimpinan/dashboard');
                    }
                    else if($data->type == 'member'){
                    redirect('member/member');
                    } 
                    elseif ($data->type == 'pjbt_pk') {
                    redirect('pimpinan/dashboard');
                    }
                } 
                else {
                    $this->load->view('authentication/login');
                }
            } else {
                //Jika bernilai FALSE maka tampilkan error
                $data['error'] = $error;
                $this->load->view('authentication/login',$data);
            }
            //Jika tidak maka alihkan kembali ke halaman login
        } else {
            $this->load->view('authentication/login');
        }
    }

    public function changePassword()
    {
        $this->load->model('Model_users');
        $this->cekAkun();
        $data['title'] = 'Change Password';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('oldpass', 'old password', 'callback_password_check');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() == false) {
            $this->load->view('authentication/change',$data);
        }
        else {
            $id = $this->session->userdata('id_user');
            $newpass = $this->input->post('newpass');
            $this->Model_users->update_user($id, array('password' => md5($newpass)));

            redirect('authentication/auth/logout');
        }
    }

    public function password_check($oldpass)
    {
        $this->load->model('Model_users');
        $id = $this->session->userdata('id_user');
        $user = $this->Model_users->get_user($id);
        if($user->password !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }

    public function logout(){
    //Menghapus semua session (sesi)
    $this->session->sess_destroy();
    redirect('authentication/auth/login');
    }
}