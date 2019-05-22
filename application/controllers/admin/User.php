<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
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
		$this->load->view('admin/User_view', $khachhang, FALSE);
		
	}

	public function userNhanVien()
	{
		$nhanvien = $this->User_model->getUserNhanVien();
		$nhanvien = array('user' => $nhanvien);
		$this->load->view('admin/User_view', $nhanvien, FALSE);
		
	}

	public function addUser()
	{
		$this->load->view('admin/create_User_view');
	}

	// Add a new item
	public function add()
	{
		if($this->input->post('password_again') == $this->input->post('password'))
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

			$check = $this->User_model->insert($taikhoan);
			if($check) 
			{
				$this->load->view('admin/create_User_view', array('status' => true, 'message' => 'Tạo tài khoản thành công')); 
			} 
			else
			{
				$this->load->view('admin/create_User_view', array('status' => false , 'message' => 'Tạo tài khoản không thành công'));
			}
		}
		else
		{
			$this->load->view('admin/create_User_view', array('thongbao' => 'Xác nhận mật khẩu không chính xác'));
		}
		


	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{
		$this->User_model->delete($id);
		$user = $this->User_model->get($id);
		if($user['level'] == 0)
		{
			$this->load->view('admin/User_view', array('user' => $this->User_model->getUserNhanVien()));
		}
		else if($user['level'] == 1)
		{
			$this->load->view('admin/User_view', array('user' => $this->User_model->getUserKhachHang()));
		}
 	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
