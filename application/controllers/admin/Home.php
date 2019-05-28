<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		header("location:/project2/admin/Product");
	}

	public function DD()
	{
		$this->load->model('Product_model');
		$data = $this->Product_model->get();
		foreach ($data as $key => $value) {
			$this->Product_model->update(array('quantity' =>100, 'quantity_exp' =>0), $value['id']);
		}
		
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */
