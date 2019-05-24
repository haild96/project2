<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->model('Product_model');
	}

	public function index() {
		$category = $this->Category_model->getAllCategory();
		$id = array();
		for ($i = 0; $i < count($category); $i++) {
			$id[$i] = $category[$i]['id'];
		}
		$phone   = $this->Product_model->getProductByCategory($id[0]); 
		$tablet  = $this->Product_model->getProductByCategory($id[1]);
		$laptop  = $this->Product_model->getProductByCategory($id[2]);
		$phukien = $this->Product_model->getProductByCategory($id[3]);
		$new     = $this->Product_model->getProductByNew();
		$data    = array('category'=> $category, 'phone' => $phone, 'tablet' => $tablet, 'laptop' => $laptop, 'phukien' => $phukien, 'new' => $new);
		$this->load->view('Home_view', $data, FALSE);
	}

	public function singleProduct($id_category, $id) {
		// detail product
		$data = $this->Product_model->getSingleProduct($id, $id_category);
		$sp_same = $this->Product_model->getProductSame($id, $id_category);
		$data = array('data' => $data, 'spSame' => $sp_same);
		$this->load->view('singleProduct_view', $data, FALSE);
	}

	public function addToCart() {
		$id = $this->input->post('id');
		$slAdd = $this->input->post('sl');
		if (isset($this->session->userdata['cart'][$id])) {
			$quantityInCart = $this->session->userdata['cart'][$id][0];
			$all = $quantityInCart + $slAdd;
			if ($all > 5) {
				echo "limit";
			} else {
				if ($this->Product_model->checkQuantity($id, $all)) {
					$this->session->userdata['cart'][$id][0] = $all;
					echo "done";
				} else {
					echo "expired";
				}
			}
		} else {
			if ($this->Product_model->checkQuantity($id, $slAdd)) {
				$temp = array($slAdd + 0, 0);
				$this->session->userdata['cart'][$id] = $temp;
				echo "done";
			} else {
				echo "expired";
			}
		}
	}

	public function Cart() {
		if (isset($this->session->userdata['cart'])) {
			$cart = $this->session->userdata['cart'];
			$where = array();
			foreach ($cart as $key => $value) {
				array_push($where, $key);
			}
			$data = $this->Product_model->getProductByCart($where);
			$data = array('data' => $data);
			$this->load->view('cart_view', $data);
		} else {
			$data = NULL;
			$data = array('data' => $data);
			$this->load->view('cart_view', $data, FALSE);
		}
	}

	public function editQuantity() {
		$id = $this->input->post('id');
		$sl = $this->session->userdata['cart'][$id][0];
		$sl--;
		$this->session->userdata['cart'][$id][0] = $sl;
	}



}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */