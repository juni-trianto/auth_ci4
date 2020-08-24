<?php

namespace App\Controllers;
use App\Models\Auth_model;
use App\Models\Api_daerah_model;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['form']);
        $this->Auth_model = new Auth_model();
        $this->Api_daerah_model = new Api_daerah_model();
        $this->email = \Config\Services::email();
        
    }

    public function index()
    {

        if(session()->get('group') != 'Admin')
        {
            session()->setFlashdata('error', 'Blocked!');
            return redirect()->to(base_url('auth/login'));
        }

        $data['users'] = $this->Auth_model->get_all_user();
        $data['title'] = 'Data User';
        return view('auth/index', $data);

       
    
    }

    public function login()
    {
        $data['title'] = 'login';
        echo view('auth/templates/header', $data);
        echo view('auth/login');
        echo view('auth/templates/footer');

    }

    public function login_()
    {
        
        $validasi = $this->validate([
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|trim|valid_email',
                'errors' => [
                    'required'   => 'Email Harus Di Isi!',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?'
                ]
            ],
        ]);

        if( isset($_POST['submit']) && $validasi)
        {
            $email    = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek_user = $this->Auth_model->cek_user_login($email);
            $get_email = $cek_user['email'];

         
            if($cek_user['active'] == 1)
            {
             
                if(  password_verify($password, $cek_user['password']))
                {
                    $sessData = [
                        'id_user'    => $cek_user['id_user'],
                        'email'      => $cek_user['email'],
                        'isLoggedIn' => TRUE ,
                        'group'      => $cek_user['name'],
                        'group_id'   => $cek_user['id_group']
                    ];
                    $data = ['last_login' => date('Y-m-d H:i:s')];
                    $this->Auth_model->last_login($data, $get_email);
                    $session = session();
                    $session->set($sessData);

                    if($cek_user['group_id'] == 1)
                    {

                        session()->setFlashdata('success', 'Login Success!');
                        return redirect()->to(base_url('Dashboard'));
                    }else{
                        session()->setFlashdata('success', 'Login Success!');
                        return redirect()->to(base_url('auth/login'));
                    }


                }else{
                    session()->setFlashdata('error', '  password salah bro.!');
                    return redirect()->to(base_url('auth/login'));
                }

            }else{
                session()->setFlashdata('error', '  please check your email! this email has not activated');
                return redirect()->to(base_url('auth/login'));
            }

        }else{
            $data['title'] = 'login';
            echo view('auth/templates/header', $data);
            echo view('auth/login');
            echo view('auth/templates/footer');
        }

    }

    public function register()
    {
        $data['title'] = 'Register'; 
        echo view('auth/templates/header', $data);
        echo view('auth/register');
        echo view('auth/templates/footer');

    }

    public function register_()
    {
        $validasi = $this->validate([
            'first_name' => [
                'label'  => 'First Name',
                'rules'  => 'required',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong '
                ]
            ],
            'last_name' => [
                'label'  => 'Last Name',
                'rules'  => 'required',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong '
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|trim|valid_email|is_unique[users.email]',
                'errors' => [
                    'is_unique'   => 'This email has already registered!',
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[8]|matches[confirm_password]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?'
                ]
            ],
            'confirm_password' => [
                'label'  => 'Confirm Password',
                'rules'  => 'required|min_length[8]|matches[password]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?'
                ]
            ],
        ]);

        if (isset($_POST['submit']) &&  $validasi) {

            $token = base64_encode(random_bytes(32));
            $email = $this->request->getPost('email');
            $data = [
                'first_name'    => $this->request->getPost('first_name'),
                'last_name'     => $this->request->getPost('last_name'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'email'         => $email,
                'password'      => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'status_users'  => 2 ,
                'active'        => 0 ,
                'created_at'    => date('Y-m-d H:i:s')
            ];

            $this->email->setFrom(' email anda ', 'Toko Online Juni');
            $this->email->setTo($email);
            $this->email->setSubject('Activated');
            $this->email->setMessage('Click this link to verify you account : <a href="' . base_url() . '/auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Activate</a> ');

            if (!$this->email->send()) {
                return 'Gagal Kirim Email';
            } else {
                $this->Auth_model->register_user($data, $token, $email);
                session()->setFlashdata('success', 'Register Berhasil! Silahkan cek Email Anda');
                return redirect()->to(base_url('Auth/register'));
               
            }
            

        } else {
            $data['title'] = 'Register'; 
            echo view('auth/templates/header', $data);
            echo view('auth/register');
            echo view('auth/templates/footer');
        }

    }

  public function verify()
  {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $user =   $this->Auth_model->verify($email);
        $user_email = $user['email'];
        $user_id    = $user['id_user'];


        if($user){
            $user_token = $this->Auth_model->cek_token($token);
            $waktu_awal        = strtotime($user_token['created_at']);
            $waktu_akhir       = time();
            $diff              = $waktu_akhir - $waktu_awal;
            $jam               = floor($diff / (60 * 60));


            if ($jam  < 24 ) {
              
                
                $this->Auth_model->active($user_email, $user_id);
                session()->setFlashdata('success', 'Silahkah Login!');
                return redirect()->to(base_url('Auth/login'));
                
               
            }else{
                $this->Auth_model->delete_user_token($user_email);
                session()->setFlashdata('error', '  account Activation failed, email expired');
                return redirect()->to(base_url('Auth/login'));

            }

        }else{
            echo'Null (Failed)';
        }

     
  }

  public function lupa_password()
  {
       $data['title'] = 'Lupa Password';
        echo view('auth/templates/header' , $data);
        echo view('auth/lupa_password');
        echo view('auth/templates/footer');
  }

  public function send_email_lupaPassword()
  {
       $validasi = $this->validate([
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|trim|valid_email',
                'errors' => [
                    'required'   => '{field} tidak boleh kosong '
                ]
            ],

       ]);

       if($validasi)
       {
           
            $token = base64_encode(random_bytes(32));
            $email = $this->request->getPost('email');
            $cek_email = $this->Auth_model->cek_email_change_password($email);

            if($cek_email == null)
            {
                session()->setFlashdata('error', 'Email tidak Di Ditemukan!');
                return redirect()->to(base_url('Auth/lupa_password'));
            }else{

                $data = [
                    'email'         => $email,
                    'token'         => $token,
                    'created_at'    => date('Y-m-d H:i:s')
                ];
    
                $this->email->setFrom('email anda', 'Toko Online Juni');
                $this->email->setTo($email);
                $this->email->setSubject('Activated');
                $this->email->setMessage('Click this link to verify you account : <a href="' . base_url() . '/auth/reset_password?email=' . $email . '&token=' . urlencode($token) . '">Change Password</a> ');
    
                if (!$this->email->send()) 
                {
                    return 'Gagal Kirim Email';
                }else{
                    $this->Auth_model->reset_password($data);
                    session()->setFlashdata('success', 'Silahkan Cek Email Anda!');
                    return redirect()->to(base_url('Auth/login'));
                }
            }

       }else{
            $data['title'] = 'Lupa Password';
             echo view('auth/templates/header', $data);
            echo view('auth/lupa_password');
            echo view('auth/templates/footer');
       }
  }

  public function reset_password()
  {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $user =   $this->Auth_model->verify($email);

        if ($user['created_at']) {
            $user_token = $this->Auth_model->cek_token($token);

         
            if ($user_token) {

                $sessData = ['email' => $user['email']];
                $session = session()->set($sessData);
                $data['title'] = 'Reset Password';
                echo view('auth/templates/header', $data);
                echo view('auth/change_password', $data);
                echo view('auth/templates/footer');

            
            } else {
                echo 'gagal';
            }
        } else {
            echo 'Null (Failed)';
        }

  }

  public function change_password()
  {
        $validasi = $this->validate([
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[8]|matches[confirm_password]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?'
                ]
            ],
            'confirm_password' => [
                'label'  => 'Confirm Password',
                'rules'  => 'required|min_length[8]|matches[password]',
                'errors' => [
                    'min_length' => 'Your {field} is too short. You want to get hacked?'
                ]
            ],
        ]);

        if($validasi)
        {
            $data     = ['password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)  ];
            $email    = $this->request->getPost('email');
            $this->Auth_model->change_password($data, $email);
            session()->destroy();
            session()->setFlashdata('success', 'Password Berhasil Di Ubah, Silahkan Login!');
            return redirect()->to(base_url('auth/login'));
            
        }else{
            $data['title'] = 'Reset Password';
            echo view('auth/templates/header', $data);
            echo view('auth/change_password');
            echo view('auth/templates/footer');
        }
  }

  public function logout()
  {
      session()->destroy();
      session()->setFlashdata('success', 'Logout Success full');
      return redirect()->to(base_url('auth/login'));
  }

  public function edit_user($id)
  {
      $data['user']     = $this->Auth_model->get_detail_user($id);
      $data['title']    = 'Detail Edit User';
      $data['groups']     = $this->Auth_model->get_group();

        echo view('auth/templates/header', $data);
        echo view('auth/edit_user', $data);
        echo view('auth/templates/footer', $data);

  }

  public function change_user_id()
  {
      $id      = $this->request->getPost('id');
      $group   = $this->request->getPost('group');
      $this->Auth_model->ubah_roles_user($id, $group);

        session()->setFlashdata('success', 'Role Permission User Di Ubah');
        return redirect()->to(base_url('/auth/edit_user' .'/' . $id));

    
  }


  public function add_group()
  {
      $id = $this->request->getPost('id');
      $data = [
            'name'          => $this->request->getPost('nama_group'),
            'description'   => $this->request->getPost('description')
      ];

       $this->Auth_model->tambah_group($data);
        session()->setFlashdata('success', 'Add Group');
        return redirect()->to(base_url('/auth/edit_user' . '/' . $id));


  }

    public function profile()
    {
        $id               = session()->get('id_user');
        $data['user']     = $this->Auth_model->get_detail_user($id);
        $data['provinsi'] = $this->Api_daerah_model->provinsi();
        $data['title']    = 'Profile User';
        echo view('auth/templates/header', $data);
        echo view('Auth/profile', $data);
        echo view('auth/templates/footer');
    }
    public function edit_user_profile()
    {
        $id               = session()->get('id_user');
        $data['user']     = $this->Auth_model->get_detail_user($id);
        $data['provinsis'] = $this->Api_daerah_model->provinsi();
        $data['title']    = 'Edit User Profile';
        echo view('auth/templates/header', $data);
        echo view('Auth/edit_user_profile', $data);
        echo view('auth/templates/footer');
    }

    public function update_profile_user()
    {
        // $email          = $this->request->getPost('email');
        $id_provinsi    = $this->request->getPost('provinsi');
        $get_provinsi   =  $this->Api_daerah_model->get_id_provinsi($id_provinsi);

        var_dump($id_provinsi);
        die;

        // $idkota         = $this->request->getPost('kota');
        // $get_kota       = $this->Api_daerah_model->get_id_kota($idkota);
        // $idkecamatan    = $this->request->getPost('kecamatan');
        // $get_kecamatan  = $this->Api_daerah_model->get_id_kecamatan($idkecamatan);
        // $iddesa         = $this->request->getPost('desa');
        // $get_desa       = $this->Api_daerah_model->get_id_desa($iddesa);


        // $data  = [
        //     'first_name'        => $this->request->getPost('first_name'),
        //     'last_name'         => $this->request->getPost('last_name'),
        //     'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
        //     'email'             => $this->request->getPost('email'),
        //     'phone'             => $this->request->getPost('phone'),
        //     'alamat_lengkap'    => $this->request->getPost('alamat'),
        //     'provinsi'          => $get_provinsi['nama'],
        //     'kota'              => $get_kota['nama'],
        //     'kecamatan'         => $get_kecamatan['nama'], 
        //     'desa'              => $get_desa['nama'],
        //     'rt'                => $this->request->getPost('rt'),
        //     'rw'                => $this->request->getPost('rw'),
        // ];

        // $this->Auth_model->update_user($email, $data);
        // session()->setFlashdata('success', 'Update Success');
        // return redirect()->to(base_url('/auth/profile'));

    }
















  


}
