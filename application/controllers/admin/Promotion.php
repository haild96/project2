<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Promotion_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
		$quangcao = $this->Promotion_model->get();
		$quangcao = array('quangcao' => $quangcao);
		$this->load->view('admin/Promotion_view', $quangcao, FALSE);
	}

	public function addPromotion()
	{
		$this->load->view('admin/add_Promotion_view');
	}

	// Add a new item
	public function add()
	{
		$quangcao = array(
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'status' => $this->input->post('status'),
			'time_start' => strtotime($this->input->post('time_start')),
			'time_end' => strtotime($this->input->post('time_end'))
		);

		$check = $this->Promotion_model->insert($quangcao);
		if($check) 
		{
			$this->load->view('admin/add_Promotion_view', array('status' => true, 'message' => 'Thêm quảng cáo thành công')); 
		} 
		else
		{
			$this->load->view('admin/add_Promotion_view', array('status' => false , 'message' => 'Thêm quảng cáo thành công'));
		}
	}

	public function editByID($id)
	{
		$quangcao = $this->Promotion_model->get($id);
		$quangcao = array('quangcao' => $quangcao);
		$this->load->view('admin/edit_Promotion_view', $quangcao, FALSE);
	}

	//Update one item
	public function update( $id = NULL )
	{
		$quangcao = array(
			'name' => $this->input->post('name'),
			'detail' => $this->input->post('detail'),
			'status' => $this->input->post('status'),
			'time_start' => strtotime($this->input->post('time_start')),
			'time_end' => strtotime($this->input->post('time_end'))
		);

		$check = $this->Promotion_model->update($quangcao, $id);
		if($check) 
		{
			$this->load->view('admin/edit_Promotion_view', array('status' => true, 'message' => 'Sửa quảng cáo thành công', 'quangcao' => $this->Promotion_model->get($id) )); 
		} 
		else
		{
			$this->load->view('admin/edit_Promotion_view', array('status' => false , 'message' => 'Sửa quảng cáo không thành công', 'quangcao' => $this->Promotion_model->get($id)));
		}
	}

	//Delete one item
	public function delete( $id = NULL )
	{
		if($this->Promotion_model->delete($id))
		{
			$this->load->view('admin/Promotion_view', array('quangcao' => $this->Promotion_model->get()), FALSE);
		}
	}
}

/* End of file Promotion.php */
/* Location: ./application/controllers/admin/Promotion.php */
