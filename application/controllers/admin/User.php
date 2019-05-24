<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{

	}


	public function userKhachHang()
	{
		$khachhang = $this->User_model->getUserKhachHang();
		$khachhang = array('user' => $khachhang);
		$this->load->view('admin/user/User_view', $khachhang, FALSE);
		
	}

	public function userNhanVien()
	{
		$nhanvien = $this->User_model->getUserNhanVien();
		$nhanvien = array('user' => $nhanvien);
		$this->load->view('admin/user/User_view', $nhanvien, FALSE);
		
	}

	public function addUser()
	{
		$this->load->view('admin/user/create_User_view');
	}

	// Add a new item
	public function add()
	{
		$numofUser = $this->User_model->checkExistAccount($this->input->post('username'));
		if($numofUser != 0 )
		{
			$this->load->view('admin/user/create_User_view', array('status' => false , 'message' => 'Tên tài khoản đã tồn tại'));
		}
		else if($this->input->post('password_again') == $this->input->post('password'))
		{
			// $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			// $password = crypt($this->input->post('password'), '$2y$12$' . $salt);

			$taikhoan = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'level' => $this->input->post('level'),
				'status' => $this->input->post('status'),
				// 'salt' => $this->input->post('status')
			);

			$check = $this->User_model->insert($taikhoan);
			if($check) 
			{
				$this->load->view('admin/user/create_User_view', array('status' => true, 'message' => 'Tạo tài khoản thành công')); 
			} 
			else
			{
				$this->load->view('admin/user/create_User_view', array('status' => false , 'message' => 'Tạo tài khoản không thành công'));
			}
		}
		else
		{
			$this->load->view('admin/user/create_User_view', array('thongbao' => 'Xác nhận mật khẩu không chính xác'));
		}
     }

    public function InfoUser()
    {
    	$user = array(
    		'id' => $this->session->userdata('id'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'fullname' => $this->session->userdata('fullname'),
			'email' => $this->session->userdata('email'),
			'phone' => $this->session->userdata('phone'),
			'address' => $this->session->userdata('address'),
			'level' => $this->session->userdata('level'),
			'status' => $this->session->userdata('status')
		);
		$user = array('user' => $user);
    	$this->load->view('admin/user/InfoUser_view', $user, FALSE);
    }

    public function editInfoUser()
    {
    	$user = array(
    		'id' => $this->session->userdata('id'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'fullname' => $this->session->userdata('fullname'),
			'email' => $this->session->userdata('email'),
			'phone' => $this->session->userdata('phone'),
			'address' => $this->session->userdata('address'),
			'level' => $this->session->userdata('level'),
			'status' => $this->session->userdata('status')
		);
		$user = array('user' => $user);
    	$this->load->view('admin/user/edit_InfoUser_view', $user, FALSE);
    }

    public function editByID($id)
    {
     	$user = $this->User_model->get($id);
     	$user = array('user' => $user);
     	$this->load->view('admin/user/edit_User_view', $user, FALSE);
    }

    public function updateInfoUser($id)
    {
    	$taikhoan = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status')
		);

		$check = $this->User_model->update($taikhoan, $id);
		if($check) 
		{
			$account = array('id','username','password','fullname','email','phone','address','level','status');
			$this->session->unset_userdata($account); 
			header('location:project2/admin/User/login');
		} 
		else
		{
			$this->load->view('admin/user/edit_InfoUser_view', array('status' => false , 'message' => 'Sửa tài khoản không thành công', 'user' => $this->User_model->get($id)));
		}
    }

    public function changePassword()
    {
    	$user = array(
    		'id' => $this->session->userdata('id'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'fullname' => $this->session->userdata('fullname'),
			'email' => $this->session->userdata('email'),
			'phone' => $this->session->userdata('phone'),
			'address' => $this->session->userdata('address'),
			'level' => $this->session->userdata('level'),
			'status' => $this->session->userdata('status')
		);
		$user = array('user' => $user);
    	$this->load->view('admin/user/changePassword_User_view', $user, FALSE);
    }

    public function updateNewPassword($id)
    {
    	if($this->input->post('password') == $this->input->post('password_again'))
    	{
    		$taikhoan = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
				'level' => $this->input->post('level'),
				'status' => $this->input->post('status')
			);
			$check = $this->User_model->update($taikhoan, $id);
			if($check) 
			{
				$account = array('id','username','password','fullname','email','phone','address','level','status');
				$this->session->unset_userdata($account); 
				header('location:project2/admin/User/login');
			} 
			else
			{
				$this->load->view('admin/user/changePassword_User_view', array('status' => false , 'message' => 'Sửa tài khoản không thành công', 'user' => $this->User_model->get($id)));
			}
    	}
    	else
		{
			$this->load->view('admin/user/changePassword_User_view', array('thongbao' => 'Xác nhận mật khẩu không chính xác'));
		}
    	
    }

	//Update one item
	public function update( $id = NULL )
	{
		$taikhoan = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'level' => $this->input->post('level'),
			'status' => $this->input->post('status'),
		);

		$check = $this->User_model->update($taikhoan, $id);
		if($check) 
		{
			$this->load->view('admin/user/edit_User_view', array('status' => true, 'message' => 'Sửa tài khoản thành công', 'user' => $this->User_model->get($id))); 
		} 
		else
		{
			$this->load->view('admin/user/edit_User_view', array('status' => false , 'message' => 'Sửa tài khoản không thành công', 'user' => $this->User_model->get($id)));
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->User_model->delete($id);
		$user = $this->User_model->get($id);
		if($user['level'] == 0)
		{
			$this->load->view('admin/user/User_view', array('user' => $this->User_model->getUserNhanVien()));
		}
		else if($user['level'] == 1)
		{
			$this->load->view('admin/user/User_view', array('user' => $this->User_model->getUserKhachHang()));
		}
 	}

 	public function login()
 	{
 		$this->load->view('admin/auth/login');
 	}

 	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('phone');
		$this->session->unset_userdata('address');
		$this->session->unset_userdata('id');
		$this->session->sess_destroy();
		header('location:/project2/admin/User/login');
	}

 	public function authenUser()
 	{
 	// 	$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
		// $password = crypt($this->input->post('password'), '$2y$12$' . $salt);

 		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data = $this->User_model->confirm_account($username, $password);
		if ($data == 0) {
			$this->load->view('admin/auth/login', array('status' => false, 'message' => 'Tài khoản hoặc mật khẩu không đúng'));
		} else {
			
			$level    = $data[0]['level'];
			$fullname = $data[0]['fullname'];
			$email    = $data[0]['email'];
			$phone    = $data[0]['phone'];
			$address  = $data[0]['address'];
			$username = $data[0]['username'];
			$id       = $data[0]['id'];
			$password = $data[0]['password'];
			$status = $data[0]['status'];
			$account = array('username' => $username,
							 'password' => $password,
							 'level'    => $level,
							 'fullname' => $fullname,
							 'email'    => $email,
							 'phone'    => $phone,
							 'address'  => $address,
							 'id'       => $id,
							 'status'   => $status);
			$this->session->set_userdata($account);
			header('location:/project2/admin/Category');
		}
 	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
