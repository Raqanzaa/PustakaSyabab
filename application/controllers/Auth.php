<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Jika user sudah login, redirect ke Dashboard
        if ($this->session->userdata('username')) {
            redirect('Dashboard');
        }

        // Validasi form
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Jika validasi gagal, tampilkan halaman login
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('v_login/login_admin');
        } else {
            // Jika validasi sukses, proses login
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Cek username di database
        $admin = $this->db->get_where('tbl_admin', ['username' => $username])->row_array();

        // Jika username ditemukan
        if ($admin) {
            // var_dump($password);
            // var_dump($admin['password']);
            // die();
            // Cek password yang diinputkan dengan password yang di-hash di database
            if (password_verify($password, $admin['password'])) {
                $data = ['Username' => $admin['username']];
                $this->session->set_userdata($data);
                $this->session->set_userdata(['username' => $admin['username']]);
                $this->session->set_flashdata('success', 'Selamat datang kembali ' . $admin['nama_admin'] . '!');
                // $this->session->set_flashdata('success', 'Kamu berhasil login!');
                redirect('Dashboard');
            } else {
                // Password salah
                $this->session->set_flashdata('error', 'Password salah. Coba lagi!');
                redirect('Auth');
            }
        } else {
            // Username tidak terdaftar
            $this->session->set_flashdata('error', 'Username atau Password salah!');
            redirect('Auth');
        }
    }


    public function Registration()
    {
        // Jika sudah login, redirect ke dashboard
        if ($this->session->userdata('username')) {
            redirect('Dashboard');
        }
    
        // Validasi form
        $this->form_validation->set_rules('nama_admin', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tbl_admin.username]', [
            'is_unique' => 'This username has already been registered!'
        ]);
        $this->form_validation->set_rules('no_hp_admin', 'Phone Number', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password is too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');
    
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Registration';
            $this->load->view('v_login/register_admin', $data);
        } else {
            // Jika validasi berhasil, siapkan data untuk disimpan
            $data = [
                'nama_admin' => htmlspecialchars($this->input->post('nama_admin', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'no_hp_admin' => htmlspecialchars($this->input->post('no_hp_admin', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
    
            // Simpan data ke database
            $this->db->insert('tbl_admin', $data);
    
            // Set pesan flash untuk registrasi sukses
            $this->session->set_flashdata('success', 'Akun berhasil dibuat. Silahkan login!');
    
            // Redirect ke halaman login
            redirect('auth');
        }
    }    


    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'wpunpas@gmail.com',
            'smtp_pass' => '1234567890',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('wpunpas@gmail.com', 'Web Programming UNPAS');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        // $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('success', 'Kamu sudah logout!');
        redirect('Auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
}
